<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function inicio()
    {
        return view('welcome');
    }

    public function fechas(Request $request)
    {

        $request->validate([
            'date' => 'required'
        ]);

        //return $request->all();
        $birthday = $request->date;


        $olddate = substr($birthday, 4);
        $newdate = date("Y") . "" . $olddate;
        $nextyear = date("Y") + 1 . "" . $olddate;

        if (strtotime($newdate) > strtotime(date("Y-m-d"))) {
            $start_ts = strtotime($newdate);
            $end_ts = strtotime(date("Y-m-d"));
            $diff = $end_ts - $start_ts;
            $n = round($diff / (60 * 60 * 24));

            $days = substr($n, 1);

        } else {
            $start_ts = strtotime(date("Y-m-d"));
            $end_ts = strtotime($nextyear);
            $diff = $end_ts - $start_ts;
            $days = round($diff / (60 * 60 * 24));

        }

        if ($days == 0) {
            return back()->with('fechaback', '¡Felicidades, hoy es tu cumpleaños!');
        } else if ($days == 1) {
            return back()->with('fechaback', '¡Falta ' . $days . ' dia para tu cumpleaños!');
        } else {
            return back()->with('fechaback', '¡Faltan ' . $days . ' dias para tu cumpleaños!');
        }
    }
}
