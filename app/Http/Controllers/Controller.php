<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get_buttons($edit_btn_url, $id)
    {
        return '
        <a class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1" href="' . $edit_btn_url . '">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="acorn-icons acorn-icons-edit-square undefined">
                <path
                    d="M11 2L5.5 2C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5L2 14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18L14.5 18C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5L18 11">
                </path>
                <path
                    d="M15.4978 3.06224C15.7795 2.78052 16.1616 2.62225 16.56 2.62225C16.9585 2.62225 17.3405 2.78052 17.6223 3.06224C17.904 3.34396 18.0623 3.72605 18.0623 4.12446C18.0623 4.52288 17.904 4.90497 17.6223 5.18669L10.8949 11.9141L8.06226 12.6223L8.7704 9.78966L15.4978 3.06224Z">
                </path>
            </svg>
            <span class="d-none d-xxl-inline-block">Edit</span>
        </a>
        <button class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1" onclick="deleteData(' . $id . ')" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="acorn-icons acorn-icons-bin undefined">
                <path
                    d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5">
                </path>
                <path
                    d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5">
                </path>
                <path d="M2 5H18M12 9V13M8 9V13"></path>
            </svg>
            <span class="d-none d-xxl-inline-block">Delete</span>
        </button>';
    }

    public function viewButton($view_btn_url, $title = 'View')
    {
        return '<a href="' . $view_btn_url . '" class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1"  type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="acorn-icons acorn-icons-bin undefined">
                <path
                    d="M2.47466 10.8418C2.15365 10.3203 2.15365 9.67971 2.47466 9.15822C3.49143 7.50643 6.10818 4 10 4C13.8918 4 16.5086 7.50644 17.5253 9.15822C17.8464 9.67971 17.8464 10.3203 17.5253 10.8418C16.5086 12.4936 13.8918 16 10 16C6.10818 16 3.49143 12.4936 2.47466 10.8418Z">
                </path>
                <path
                    d="M10 12C11.1046 12 12 11.1046 12 10C12 8.89543 11.1046 8 10 8C8.89543 8 8 8.89543 8 10C8 11.1046 8.89543 12 10 12Z">
                </path>
            </svg>
            <span class="d-none d-xxl-inline-block">' . $title . '</span>
        </a>';
    }
    public function pumpButton($view_btn_url, $title = 'View')
    {
        return '<a href="' . $view_btn_url . '" class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1"  type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
        class="acorn-icons acorn-icons-bin undefined">
        <path d="M3 12C3 11.0681 3 10.6022 3.15224 10.2346 3.35523 9.74458 3.74458 9.35523 4.23463 9.15224 4.60218 9 5.06812 9 6 9H14C14.9319 9 15.3978 9 15.7654 9.15224 16.2554 9.35523 16.6448 9.74458 16.8478 10.2346 17 10.6022 17 11.0681 17 12V12C17 12.9319 17 13.3978 16.8478 13.7654 16.6448 14.2554 16.2554 14.6448 15.7654 14.8478 15.3978 15 14.9319 15 14 15H6C5.06812 15 4.60218 15 4.23463 14.8478 3.74458 14.6448 3.35523 14.2554 3.15224 13.7654 3 13.3978 3 12.9319 3 12V12zM5.09262 5.17584C5.29047 4.48337 5.38939 4.13713 5.57383 3.86837 5.81974 3.51001 6.1757 3.24151 6.58783 3.1035 6.89692 3 7.25701 3 7.97719 3H12.0228C12.743 3 13.1031 3 13.4122 3.1035 13.8243 3.24151 14.1803 3.51001 14.4262 3.86837 14.6106 4.13713 14.7095 4.48337 14.9074 5.17584V5.17584C15.2364 6.32737 15.4009 6.90313 15.3148 7.36588 15.2 7.98287 14.8022 8.51019 14.2405 8.79008 13.8192 9 13.2204 9 12.0228 9H7.97719C6.77958 9 6.18077 9 5.75949 8.79008 5.19778 8.51019 4.80002 7.98287 4.68521 7.36588 4.5991 6.90313 4.76361 6.32737 5.09262 5.17584V5.17584z"></path><path opacity="0.9" d="M13 12 13.5 12 14 12M16 8 16.5 8 17 8M3 8 3.5 8 4 8M6 12 6.5 12 7 12"></path><path d="M6 15C6.55228 15 7 15.4477 7 16L7 17C7 17.5523 6.55228 18 6 18V18C5.44772 18 5 17.5523 5 17L5 16C5 15.4477 5.44772 15 6 15V15zM14 15C14.5523 15 15 15.4477 15 16L15 17C15 17.5523 14.5523 18 14 18V18C13.4477 18 13 17.5523 13 17L13 16C13 15.4477 13.4477 15 14 15V15z"></path></svg>
            <span class="d-none d-xxl-inline-block">' . $title . '</span>
        </a>';
    }

    public function delete_button($id)
    {
        return '
        <button class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1" onclick="deleteData(' . $id . ')" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="acorn-icons acorn-icons-bin undefined">
                <path
                    d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5">
                </path>
                <path
                    d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5">
                </path>
                <path d="M2 5H18M12 9V13M8 9V13"></path>
            </svg>
            <span class="d-none d-xxl-inline-block">Delete</span>
        </button>';
    }
    public function approve_button($id)
    {
        return '
        <button class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1" onclick="approveData(' . $id . ')" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-bin undefined"><path d="M16 5L7.7051 14.2166C7.32183 14.6424 6.65982 14.6598 6.2547 14.2547L3 11"></path></svg>
            <span class="d-none d-xxl-inline-block">Approve</span>
        </button>';
    }

    public function edit_button($id)
    {
        return '
        <button class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1" onclick="editFormShow(' . $id . ')" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="acorn-icons acorn-icons-edit-square undefined">
                <path
                    d="M11 2L5.5 2C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5L2 14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18L14.5 18C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5L18 11">
                </path>
                <path
                    d="M15.4978 3.06224C15.7795 2.78052 16.1616 2.62225 16.56 2.62225C16.9585 2.62225 17.3405 2.78052 17.6223 3.06224C17.904 3.34396 18.0623 3.72605 18.0623 4.12446C18.0623 4.52288 17.904 4.90497 17.6223 5.18669L10.8949 11.9141L8.06226 12.6223L8.7704 9.78966L15.4978 3.06224Z">
                </path>
            </svg>
            <span class="d-none d-xxl-inline-block">Edit</span>
        </button>';
    }


    public function get_buttons_modals($id)
    {
        return '
        <button class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1" onclick="editFormShow(' . $id . ')" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="acorn-icons acorn-icons-edit-square undefined">
                <path
                    d="M11 2L5.5 2C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5L2 14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18L14.5 18C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5L18 11">
                </path>
                <path
                    d="M15.4978 3.06224C15.7795 2.78052 16.1616 2.62225 16.56 2.62225C16.9585 2.62225 17.3405 2.78052 17.6223 3.06224C17.904 3.34396 18.0623 3.72605 18.0623 4.12446C18.0623 4.52288 17.904 4.90497 17.6223 5.18669L10.8949 11.9141L8.06226 12.6223L8.7704 9.78966L15.4978 3.06224Z">
                </path>
            </svg>
            <span class="d-none d-xxl-inline-block">Edit</span>
        </button>
        <button class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1" onclick="deleteData(' . $id . ')" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="acorn-icons acorn-icons-bin undefined">
                <path
                    d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5">
                </path>
                <path
                    d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5">
                </path>
                <path d="M2 5H18M12 9V13M8 9V13"></path>
            </svg>
            <span class="d-none d-xxl-inline-block">Delete</span>
        </button>';
    }

    /**
     * return success response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($message, $data)
    {
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($message, $data = null, $code = 500)
    {
        $response = [
            'success' => false,
            'data' => $data,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }
}
