<?php

namespace App\Exports;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\UserAttendance;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Session;
class AttendenceSearchData implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $attandance = Session::get('attandance');
        $dates = Session::get('date');
        // print_r( $attandance ); print_r($dates); die;
        foreach($attandance as $attandances){
            unset($attandances->countdata);
            print_r()
            // foreach($attandance as $attandances){
            //     if(empty($attandance))
            // }
            for($i=1; $i <= count($dates)-1; $i++){
                        if($attandances->attandance[$i]){
                                $attandance[ $dates[$i]] = 1;
                        }else{
                            $attandance[ $dates[$i]] = 0;

                        }
            }
        }
        print_r($attandance); die;
    }


    public function headings(): array
    {
    	
        return [
        	'Student Name',
            'Student UID',
            'Batch Name',
            'Total Batch Sessions',
            'Number Of Sessions Attended',
            '% Count Of Attendance',
        
            
        ];
    }

    public function registerEvents(): array
        {
        return [
            AfterSheet::class    => function(AfterSheet $event) 
            {

                       $cellRange = 'A1:D1'; // All headers
                       $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Calibri');
               $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

        
            },
              ];
       }
    
}
