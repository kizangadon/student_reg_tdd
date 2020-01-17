<?php

namespace Tests\Feature;

use App\Student;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentFeatureTest extends TestCase
{
    use RefreshDatabase;

    private function createStudentData($firstname, $lastname, $dob, $gender){
        return [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'dob' => $dob,
            'gender' => $gender
        ];
    }

    /**
     * @test
     */
    public function aStudent_isCreated_whenTheCorrectDetailsAreGiven(){
        //Arrange
        $data = [
            'firstname' => 'Don',
            'lastname' => 'Kizanga',
            'dob' => '1993-03-04',
            'gender' => 'male'
        ];
        $expectedStudentsCount = 1;
        //Act
        $this->post('/student', $data);
        //Assert
        $this->assertEquals($expectedStudentsCount, count(Student::all()));
    }

    /**
     * @test
     */
    public function aStudent_isRedirectedToTheExpectedViewPath_whenAStudentHasBeenCreated(){
        $this->withoutExceptionHandling();
        //Arrange
        $data = [
            'firstname' => 'Don',
            'lastname' => 'Smoke',
            'dob' => '1993-03-22',
            'gender' => 'male'
        ];
        $expectedPath = "student.index";
        //Act
        $response = $this->post('/student', $data);
        //Assert
        $response->assertRedirect($expectedPath);
    }

    /**
     * @test
     */
    public function aStudent_isRedirectedToTheExpectedView_whenAStudentHasBeenCreated(){
        $this->withoutExceptionHandling();
        //Arrange
        $data = [
            'firstname' => 'Don',
            'lastname' => 'Smoke',
            'dob' => '1993-03-22',
            'gender' => 'male'
        ];
        $expectedView = "student.index";
        //Act
        $response = $this->post('/student', $data);
        //Assert
        $response->assertViewIs($expectedView);
    }
}
