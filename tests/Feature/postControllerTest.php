<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostControllerTest extends TestCase
{
    use RefreshDatabase; // テスト用データベースのリフレッシュ

    /**
     * Test the destroy method of PostController.
     *
     * @return void
     */
    public function testDestroyMethod()
    {
        // テスト用の投稿を作成
        $post = Post::factory()->create();

        // 投稿を削除するリクエストを送信
        $response = $this->delete(route('post.destroy', $post));

        // 削除後のリダイレクト先を確認
        $response->assertRedirect(route('post.index'));
    }
}
