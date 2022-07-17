<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Order;
use App\Http\Resources\ScoresResource;
use App\Http\Resources\AdvisorsResource;
use App\Http\Resources\PrimeParrainageResource;
use App\Http\Resources\TeamBonusResource;
use App\Models\AdvisorsTree;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{

  public function index(Request $request)
  {
    if ($request->ajax()) {
      $length = request('length');
      $start = request('start');
      $draw = request('draw');
      $search = request('search');

      $advisors = Advisor::where(function ($query) use ($search) {
        ($search) ? $query->where('login', 'LIKE', '%' . $search['value'] . '%') : null;
        ($search) ? $query->orWhere('parent_id', 'LIKE', '%' . $search['value'] . '%') : null;
        ($search) ? $query->orWhere('rank_id', 'LIKE', '%' . $search['value'] . '%') : null;
      });
      $recordsTotal = $advisors->count();
      $advisors = AdvisorsResource::collection($advisors->skip($start)->take($length)->get());

      $data = [
        'data' => $advisors,
        'draw' => $draw,
        'recordsFiltered' => $recordsTotal,
        'recordsTotal' => $recordsTotal,
      ];

      return new JsonResponse($data, 200);
    }

    $advisors = Advisor::limit(40)->get();
    $advisors = AdvisorsResource::collection($advisors);
    return view('welcome', ['advisors' => $advisors,]);
  }

  public function calculate_scores(Request $request)
  {

    if ($request->ajax()) {

      $length = request('length');
      $start = request('start');
      $draw = request('draw');
      $search = request('search');

      $orders = Order::where('paid', 1)->groupBy('advisor_id');
      $recordsTotal = count($orders->get());
      $orders = ScoresResource::collection($orders->skip($start)->take($length)->get());
      $data = [
        'data' => $orders,
        'draw' => $draw,
        'recordsFiltered' => $recordsTotal,
        'recordsTotal' => $recordsTotal,
      ];

      return new JsonResponse($data, 200);

    }


    $advisors_orders_payed = Order::where('paid', 1)->groupBy('advisor_id')->get();
    $advisors_orders_payed = ScoresResource::collection($advisors_orders_payed)->collection;
    return view('scores', ['advisors_orders_payed' => $advisors_orders_payed,]);
  }

  public function calculate_referral_bonuses(Request $request)
  {

    if ($request->ajax()) {

      $length = request('length');
      $start = request('start');
      $draw = request('draw');
      $search = request('search');

      $orders = Order::where('paid', 1)->where('fo', 1)->where('parent_id', '!=', 0);
      $recordsTotal = count($orders->get());
      $orders = PrimeParrainageResource::collection($orders->skip($start)->take($length)->get());
      $data = [
        'data' => $orders,
        'draw' => $draw,
        'recordsFiltered' => $recordsTotal,
        'recordsTotal' => $recordsTotal,
      ];

      return new JsonResponse($data, 200);

    }

    $advisors_orders_payed = Order::where('paid', 1)->where('fo', 1)->where('parent_id', '!=', 0)->get();
    $advisors_orders_payed = PrimeParrainageResource::collection($advisors_orders_payed)->collection;
    return view('primes_referral', [
      'advisors_orders_payed' => $advisors_orders_payed,
    ]);
  }
  
  public function calculate_team_bonuses(Request $request)
  {
    if ($request->ajax()) {

      $length = request('length');
      $start = request('start');
      $draw = request('draw');
      $search = request('search');
      $order = request('order');

      $advisors = AdvisorsTree::where('direct', 1);
      
      $recordsTotal = count($advisors->get());
      
      $advisors = TeamBonusResource::collection($advisors->skip($start)->take($length)->get());

      $data = [
        'data' => $advisors,
        'draw' => $draw,
        'recordsFiltered' => $recordsTotal,
        'recordsTotal' => $recordsTotal,
        'order' => $order,
      ];

      return new JsonResponse($data, 200);

    }
    $advisors = AdvisorsTree::where('direct', 1)->get();
    $advisors = TeamBonusResource::collection($advisors)->collection;
    return view('team_bonuses', [
      'advisors' => $advisors,
    ]);
  }
}
