<?php

namespace App\Http\Controllers;

use App\Http\Resources\User_Balance;
use Illuminate\Http\Request;
use App\UserBalanceModel;
use App\UserBalanceHistoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

//use Stevebauman\Location\Location;

class TransferController extends Controller
{
    //
    public function Transfer(Request $request, $id, $penerima)
    {
        if (!Auth::check()) {
            $validator = Validator::make($request->all(), [
                'balance' => 'required|integer',
                'balance_achieve' => 'required|integer',
                'type' => 'required|in:credit,debit'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->messages()->first(), 401);
            }

            $sender = UserBalanceModel::query()
                ->findOrFail($id);
            $receiver = UserBalanceModel::query()
                ->findOrFail($penerima);
            if ($request->input('balance') > $sender->balance || $id === $penerima) {
                return response()->json([
                    'message' => $request->input('balance') > $sender->balance ?
                        'saldo tidak cukup' : 'tidak dapat mengirim ke akun sendiri'
                ], 400);
            } else {
                $sender->balance -= $request->input('balance');
                $receiver->balance += $request->input('balance');
                $sender->save();
                $receiver->save();

                // sender balance history
                $historySender = new UserBalanceHistoryModel;
                $historySender->user_balance_id = $sender->id;
                $historySender->balance_before = $sender->balance + $request->input('balance');
                $historySender->balance_after = $sender->balance;
                $historySender->activity = 'send money';
                $historySender->type = $request->input('type');
                $historySender->ip = $request->ip();
                $historySender->location = 'indonesia';
                $historySender->user_agent = 'test';
                $historySender->author = 'test';
                $historySender->save();

                // receiver balance history
                $historyReceiver = new UserBalanceHistoryModel;
                $historyReceiver->user_balance_id = $receiver->id;
                $historyReceiver->balance_before = $receiver->balance - $request->input('balance');
                $historyReceiver->balance_after = $receiver->balance;
                $historyReceiver->activity = 'received money';
                $historyReceiver->type = $request->input('type');
                $historyReceiver->ip = $request->ip();
                $historyReceiver->location = 'indonesia';
                $historyReceiver->user_agent = 'test';
                $historyReceiver->author = 'test';
                $historyReceiver->save();

                $response = [
                    'status' => 'transfer telah berhasil',
                    'sender' => $sender,
                    'receiver' => $receiver,
                    'history sender' => $historySender,
                    'history receiver' => $historyReceiver
                ];
                return response()->json($response);
            }
        } else {
            return response()->json(['msg' => 'login first'], 404);
        }
    }

    public function create (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'balance' => 'required|integer',
            'balance_achieve' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages()->first(), 401);
        }

        $input = $request->all();
        $user = UserBalanceModel::create($input);

        return response()->json(['success'=> $user], 200);
    }
}
