<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class AdFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $feedbacks = Feedback::all();
        return  view('admin.feedback.index', compact('feedbacks'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     */
    public function edit(Feedback $feedback)
    {
        //
        $feedback = Feedback::findOrFail($feedback->id);
        return view('admin.feedback.index', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
        $feedback = Feedback::findOrFail($feedback->id);
        $feedbackUpdate = $request -> validate([
            'status' => 'required| '
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     */
    public function changeStatus(Feedback $feedback)
    {
        //
        $feedback = Feedback::findOrFail($feedback->id);

        $dataUpdate['status'] = 0;
        if ($feedback->status === 0) {
            $dataUpdate['status'] = 1;
        }

        $feedback->update($dataUpdate);
        return redirect()->route('admin.feedback.index');
    }


    public function getCommentsOfProductId($productId)
    {
        $comments = Feedback::where('product_id', $productId)->get();
    }
}
