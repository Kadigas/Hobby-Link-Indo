<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class ReviewController extends Controller
{
    public function review(Request $request){
        $review = new Review;

        $review->content = $request->content;
        $review->rating = $request->rating;
        $review->user_id = Auth::id();
        $review->item_id = $request->item_id;

        $review->save();

        return redirect('/item/'.$request->item_id);
    }
}
