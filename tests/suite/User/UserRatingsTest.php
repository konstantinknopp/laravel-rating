<?php

class UserRatingsTest extends RateableTestCase
{

    public function testUserAverageRating()
    {
        Rating::unguard();

        $post1 = Post::find(1);
        $post2 = Post::find(2);
        $user1 = User::find(1);

        Rating::create(['id' => 5, 'rating' => 1, 'rateable_id' => $post1->id, 'rateable_type' => 'Post', 'user_id' => $user1->id]);
        Rating::create(['id' => 6, 'rating' => 1, 'rateable_id' => $post2->id, 'rateable_type' => 'Post', 'user_id' => $user1->id]);

        Rating::reguard();

        $this->assertEquals(3, (int)Post::find(1)->userAverageRating(1));
        $this->assertEquals("3.0", Post::find(1)->userAverageRating(1));

        $this->assertEquals(1, (int)Post::find(2)->userAverageRating(1));
        $this->assertEquals('1.0', Post::find(2)->userAverageRating(1));
    }


    public function testUserSumRating()
    {
        Rating::unguard();

        $post1 = Post::find(1);
        $post2 = Post::find(2);
        $user1 = User::find(1);

        Rating::create(['id' => 5, 'rating' => 1, 'rateable_id' => $post1->id, 'rateable_type' => 'Post', 'user_id' => $user1->id]);
        Rating::create(['id' => 6, 'rating' => 1, 'rateable_id' => $post2->id, 'rateable_type' => 'Post', 'user_id' => $user1->id]);

        Rating::reguard();

        $this->assertEquals(6, Post::find(1)->userSumRating(1));
        $this->assertEquals(6, Post::find(1)->userSumRating(1));

        $this->assertEquals(2, Post::find(2)->userSumRating(1));
        $this->assertEquals(2, Post::find(2)->userSumRating(1));
    }

}
