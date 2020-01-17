<?php

namespace Tests\Feature;

use App\Subject;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function aSubject_isCreated_whenTheCorrectDetailsAreGiven(){
        $this->withoutExceptionHandling();
        //Arrange
        $data = [
            'subject' => 'Applied Communications',
            'level' => '1',
            'credits' => '10'
        ];
        $expectedSubjectCount = 2;
        //Act
        $this->post('/subject', $data);
        //Arrange
        $data = [
            'subject' => 'Programming Logic',
            'level' => '1',
            'credits' => '15'
        ];
        $expectedSubjectCount = 2;
        //Act
        $this->post('/subject', $data);
        //Assert
        $this->assertEquals($expectedSubjectCount, count(Subject::all()));
    }
}
