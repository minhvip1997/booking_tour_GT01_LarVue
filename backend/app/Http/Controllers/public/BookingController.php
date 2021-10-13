<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BookingDetail;
use App\Models\Booking;
use App\Models\Tour;
use App\Models\Payment;
use App\Http\Requests\BookRequest;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(BookRequest $request)
    {
        $book = new Booking;
        $bookdetail = new BookingDetail;
        $book->user_id = $request->user_id;
        $book->save();

        $bookdetail = new BookingDetail;
        $bookdetail->booking_id = $book->id;
        $bookdetail->amount = $request->amount;
        $bookdetail->total_people = $request->total_people;
        $bookdetail->departure_date = $request->departure_date;
        $bookdetail->tour_id = $request->tour_id;
        $bookdetail->save();

        $payment = new Payment;
        $payment->booking_id = $book->id;
        $payment->amount = $request->amount;
        $payment->save();
        return response()->json(['message' => 'Book tour success'], 201);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
