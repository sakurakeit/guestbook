<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommentTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testPost()
    {
        $comment = [
            'id' => 1,
            'parent_id' => null,
            'user_id' => '1',
            'comment' => 'comment1',
        ];
        $response = $this->call('POST', 'api/comments', $comment);
        $data = $this->parseJson($response);
        $item = $data->data;
        $this->assertEquals($comment['comment'], $item->comment);
        $this->seeInDatabase('articles', ['comments' => 'comment1']);
    }
    public function testIndex()
    {
        $response = $this->call('GET', 'api/comments');
        $data = $this->parseJson($response);
        $item = end($data->data);
        $this->assertEquals('Test comment', $item->comment);
    }

    public function testGet()
    {
        $response = $this->call('GET', 'api/comments');
        $data = $this->parseJson($response);
        $item = end($data->data);
        $response2 = $this->call('GET', 'api/comments/' . $item->id);
        $data2 = $this->parseJson($response2);
        $item2 = $data2->data;
        $this->assertEquals($item, $item2);
    }
}
