<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Student\StudentRepository;
use App\Repositories\Mark\MarkRepository;
use Spatie\ArrayToXml\ArrayToXml;

class SchoolController extends Controller
{
    //
    /**
     * @var EloquentStudent
     * @var EloquentMark
     */
    private $student;
    private $mark;

    /**
     * Main constructor.
     * @param StudentRepository $student
     * @param MarkRepository $mark
     */
    public function __construct(StudentRepository $student, MarkRepository $mark)
    {
        $this->student = $student;
        $this->mark = $mark;
    }

    public function createStudent(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $student = $this->student->create([
            'name' => $request->name
        ]);

        return json_encode($student);
    }

    public function createMark(Request $request)
    {
        $this->validate($request, [
            'mark' => 'required',
            'board' => 'required',
            'student_id' => 'required'
        ]);

        $student = $this->student->find($request->student_id);
        
        if(count($student->marks())>4) return "Error: Student already have 4 marks!";
        if($student->marks->first()->board == "CSM" && $request->board != "CSM") return "Error: Student is on other board!";
        if($student->marks->first()->board == "CSMB" && $request->board != "CSMB") return "Error: Student is on other board!";

        $mark = $this->mark->create([
            'mark' => $request->mark,
            'board' => $request->mark,
        ]);

        $mark->student()->associate($student);
        $mark->save();

        return json_encode($mark);

    }

    public function getStudent(Request $request)
    {
        $student = $this->student->find($request->id);
        $studentMarks = $this->mark->where(['student_id' => $request->id])->get();

        $collection = collect($student);
        $sumGrades = 0;

        if($studentMarks->first()->board == "CSM")
        {
            $i=0;
            foreach($studentMarks as $mark)
            {
                $collection->put('mark'.$i, $mark->mark);
                $sumGrades+=$mark->mark;
                $i++;
            }

            $average = $sumGrades/count($studentMarks);
            if($average>=7) $collection->put('Final', 'Pass');
            else $collection->put('Final', 'Fail');
            $collection->put('Average', $average);

            return json_encode($collection);

        }
        else
        {
            if(count($studentMarks)>2) 
            {
                $min = $this->mark->where(['student_id' => $request->id])->where(['mark' => $studentMarks->min('mark')])->first();
                $studentMarks->forget($min->id);

                $i=0;
                foreach($studentMarks as $mark)
                {
                    if($mark->mark == $studentMarks->min('mark')) continue;
                    $collection->put('mark'.$i, $mark->mark);
                    $sumGrades+=$mark->mark;
                    $i++;
                }

                $average = $sumGrades/(count($studentMarks)-1);
                $collection->put('Average', $average);
            }
            else
            {
                $i=0;
                foreach($studentMarks as $mark)
                {
                    $collection->put('mark'.$i, $mark->mark);
                    $sumGrades+=$mark->mark;
                    $i++;
                }

                $average = $sumGrades/count($studentMarks);
                $collection->put('Average', $average);
            }
            

            if($average>8) $collection->put('Final', 'Pass');
            else $collection->put('Final', 'Fail');

            $result = ArrayToXml::convert($collection->toArray());
            return $result;

        }

    }

}
