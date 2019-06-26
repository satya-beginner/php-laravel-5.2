<?php

// SubscriptionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\User;

class SubscriptionController extends Controller
{
    public function create(Request $request, Plan $plan)
    {

        //dump($request->all()); exit();

        $plan = Plan::where("stripe_plan",$request->get('plan'))->first();

        $user = User::find(1);

        $user->newSubscription('main', $plan->stripe_plan)->create($request->stripeToken);

        //dump($plan); exit();
//        $request->user()
//            ->newSubscription('main', $plan->stripe_plan)
//            ->create($request->stripeToken);

        return redirect()->route('home')->with('success', 'Your plan subscribed successfully');
    }
}