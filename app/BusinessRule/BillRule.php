<?php

namespace App\BusinessRule;

use Illuminate\Database\Eloquent\Model;
use App\Models\ModelBill;

class BillRule extends Model
{
    public function validateTicket(ModelBill $bills){

        $rs = $bills->where('bank',"{$bills->getBank()}")
        ->where('ticket',"{$bills->getTicket()}")
        ->where('ticket_date',"{$bills->getTicketDate()}")
        ->get();

        return count($rs);
    }
}
