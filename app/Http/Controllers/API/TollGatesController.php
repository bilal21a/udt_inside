<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\TollGate;
use App\Traits\TollGateTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TollGatesController extends Controller
{
    use TollGateTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10); // Number of records per page
        $search = $request->input('search');
        $user_id = auth('sanctum')->id();
        $query = TollGate::where('user_id', $user_id);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('address', 'LIKE', '%' . $search . '%')
                    ->orWhere('stv_fee', 'LIKE', '%' . $search . '%')
                    ->orWhere('ltv_fee', 'LIKE', '%' . $search . '%')
                    ->orWhere('note', 'LIKE', '%' . $search . '%');
                // Add more columns as needed
            });
        }
        $data = $query->paginate($perPage);
        return response()->json([
            'data' => $data->items(),
            'pagination' => [
                'currentPage' => $data->currentPage(),
                'perPage' => $data->perPage(),
                'totalPages' => $data->lastPage(),
                'totalItems' => $data->total()
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'note' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->first());
        }

        $user_id = auth('sanctum')->id();
        $tollGate = new TollGate();
        $tollGate = $this->save_toll_gate($tollGate, $request, $user_id);
        return $this->sendResponse('Toll Gate Added successfully.', $tollGate);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $tollGate = TollGate::find($id);
            if ($tollGate->user_id == auth('sanctum')->id()) {
                return $this->sendResponse('Toll Gate Data.', $tollGate);
            } else {
                throw new \Exception("");
            }
        } catch (\Throwable $th) {
            return $this->sendError('Unknown Error Occured');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'lat' => 'required',
            'lng' => 'required',
            'stv_fee' => 'required|numeric',
            'ltv_fee' => 'required|numeric',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'note' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->first());
        }

        $user_id = auth('sanctum')->id();
        $tollGate = TollGate::find($id);
        $tollGate = $this->save_toll_gate($tollGate, $request, $user_id, 'edit');
        return $this->sendResponse('Toll Gate Updated successfully.', $tollGate);
    }
    public function status_change(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:0,1',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->first());
        }
        try {
            $tollgate = TollGate::find($id);
            if ($tollgate->user_id == auth('sanctum')->id()) {
                $tollgate->status = $request->status;
                $tollgate->save();
                return $this->sendResponse('Status Changed Successfully.', null);
            } else {
                throw new \Exception("");
            }
        } catch (\Throwable $th) {
            return $this->sendError('Unknown Error Occured');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tollGate = TollGate::find($id);
            if ($tollGate->user_id == auth('sanctum')->id()) {
                $this->delete_image($tollGate->image);
                $tollGate->delete();
                return $this->sendResponse('Toll Gate Deleted successfully.', null);
            } else {
                throw new \Exception("");
            }
        } catch (\Throwable $th) {
            return $this->sendError('Unknown Error Occured');
        }
    }
}
