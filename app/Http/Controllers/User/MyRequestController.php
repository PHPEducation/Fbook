<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BookUserRepository;
use App\Repositories\Contracts\NotificationRepository;
use Auth;

class MyRequestController extends Controller
{
    protected $bookUser;

    public function __construct(
        BookUserRepository $bookUser,
        NotificationRepository $notification
    ) {
        $this->middleware('auth');
        $this->bookUser = $bookUser;
        $this->notification = $notification;
    }

    public function index()
    {
        $user = Auth::user();
        $data = [
            'owner_id' => Auth::id(),
        ];
        $with = [
            'book',
        ];
        $books = $this->bookUser->getDataRequest($data, $with);

        return view('user.my_request', compact('books'));
    }

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
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $record = $this->bookUser->updateBookRequest($request->all());
        if ($record) {
            $notification = $this->notification->find([
                'send_id' => Auth::id(),
                'receive_id' => $record->user_id,
                'target_type' => config('model.target_type.book_user'),
                'target_id' => $record->id,
            ]);
            if ($notification) {
                $this->notification->update([
                    'id' => $notification->id,
                    'view' => config('model.view.false'),
                ]);
            } else {
                $data = [
                    'send_id' => $record->owner_id,
                    'receive_id' => $record->user_id,
                    'target_type' => config('model.target_type.book_user'),
                    'target_id' => $record->id,
                    'viewed' => config('model.viewed.false'),
                ];
                $this->notification->store($data);
            }
        }

        return back()->with('success', __('page.success'));
    }

    public function destroy($id)
    {
        //
    }
}
