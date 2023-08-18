<?php

namespace App\Http\Controllers;

use App\FuelStation;
use App\TollGate;
use App\Traits\FuelStationTrait;
use App\Traits\TollGateTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class TollGateController extends Controller
{
    use TollGateTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $service_provider = $request->service_provider;
        return view('toll_gate.index', compact('service_provider'));
    }

    public function get_data(Request $request)
    {
        $service_provider = $request->service_provider;
        $data = TollGate::when($service_provider != null, function ($query) use ($service_provider) {
            return $query->with('serviceProvider')->where('user_id', $service_provider);
        })->get();
        return DataTables::of($data)
            ->addColumn('image', function ($row) {
                return '<img class="img-fluid" src="' . $row->toll_gate_image_url . '">';
            })
            ->addColumn('address', function ($row) {
                return $row->address;
            })
            ->addColumn('stv_fee', function ($row) {
                return $row->stv_fee;
            })
            ->addColumn('ltv_fee', function ($row) {
                return $row->ltv_fee;
            })
            ->addColumn('note', function ($row) {
                return $row->note;
            })
            ->addColumn('status', function ($row) {
                $status = $row->status == 1 ? "Active" : "Inactive";
                return $status;
            })
            ->addColumn('service_provider', function ($row) use($service_provider) {
                return $service_provider == null ?  '<span class="text-info fw-semibold">' . $row->serviceProvider->full_name . '</span>' : '';
            })
            ->addColumn('action', function ($row) use ($service_provider) {
                $edit_btn_url = route('toll_gate.edit', [$row->id, 'service_provider' => $service_provider]);
                return $this->get_buttons($edit_btn_url, $row->id);
            })
            ->rawColumns(['image', 'address', 'stv_fee', 'ltv_fee', 'note', 'action','service_provider'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $service_provider = $request->service_provider;
        if ($service_provider) {
            return view('toll_gate.add', compact('service_provider'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'stv_fee' => 'required|numeric',
            'ltv_fee' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'note' => 'required',
            'service_provider' => 'required',
        ]);

        $user_id = $request->service_provider;
        if ($validator->fails()) {
            return redirect()->route('toll_gate.create', ['service_provider' => $user_id])->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }

        $tollGate = new TollGate();
        $tollGate = $this->save_toll_gate($tollGate, $request, $user_id);

        return redirect()->route('toll_gate.index', ['service_provider' => $user_id])->with('alert', ['type' => 'success', 'message' => 'Toll Gate "' . $tollGate->name . '" created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $service_provider = $request->service_provider;
        if ($service_provider) {
            $tollGate = TollGate::find($id);
            return view('toll_gate.edit', compact('id', 'tollGate', 'service_provider'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required',
            'stv_fee' => 'required',
            'ltv_fee' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'note' => 'required',
            'service_provider' => 'required',
        ]);

        $user_id = $request->service_provider;
        if ($validator->fails()) {
            return redirect()->route('toll_gate.edit', [$id, 'service_provider' => $user_id])->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }

        $tollGate = TollGate::find($id);
        $tollGate = $this->save_toll_gate($tollGate, $request, $user_id, 'edit');

        return redirect()->route('toll_gate.index', ['service_provider' => $user_id])->with('alert', ['type' => 'success', 'message' => 'Toll Gate "' . $tollGate->name . '" updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tollGate = TollGate::find($id);
        // Delete the image file from storage
        if ($tollGate->image) {
            $this->delete_image($tollGate->image);
        }
        $tollGate->delete();
    }
}
