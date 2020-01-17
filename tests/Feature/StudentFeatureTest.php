<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentFeatureTest extends TestCase
{
    /**
     * @test
     */
    public function aStudent_isCreated_whenTheCorrectDetailsAreGiven(){
        //Arrange
        $data = [
            'firstname' => 'Don',
            'lastname' => 'Kizanga',
            'dob' => '1993-03-04',
            'race' => 'black'
        ];
        $expectedStudentsCount = 1;
        //Act
        $this->put('/student', $data);
        //Assert
        $this->assertEquals($expectedStudentsCount, Student::all());
    }
}
