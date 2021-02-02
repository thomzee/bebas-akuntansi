<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Webpatser\Uuid\Uuid;

class UserTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testUserIndexShouldReturnSpecificResponseAndStatus()
    {
        $response = $this->get(config('settings.APP_URL').'/api/v1/users/index');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'meta' => [
                    'code',
                    'api_version',
                    'method',
                    'message',
                ],
                'page_info' => [
                    'total',
                    'per_page',
                    'first_page',
                    'current_page',
                    'last_page',
                    'first_page_url',
                    'last_page_url',
                    'next_page_url',
                    'prev_page_url',
                    'self_page_url',
                    'count',
                    'from',
                    'to',
                ],
                'errors',
                'data' => [
                    'message',
                    'item',
                    'items' => [
                        '*' => [
                            'id',
                            'name',
                            'email',
                            'status',
                            'position',
                            'created_at',
                            'updated_at',
                        ]
                    ],
                    'additional'
                ]
            ]);
    }

    /**
     *
     * @return void
     */
    public function testCreateNewUserIsStoringIntoDbAndReturningSpecificResponseAndStatus()
    {
        $statuses = [
            'active',
            'inactive'
        ];

        $positions = [
            'admin',
            'staff'
        ];

        $faker = \Faker\Factory::create();
        $email = $faker->email;

        $response = $this->postJson(config('settings.APP_URL').'/api/v1/users/create', [
            "name" => $faker->name,
            "email" => $email,
            "status" => $statuses[rand(0,1)],
            "position" => $positions[rand(0,1)],
            "password" => rand(10000000, 99999999)
        ]);

        $this->assertDatabaseHas('users', [
            'email' => $email
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'meta' => [
                    'code',
                    'api_version',
                    'method',
                    'message',
                ],
                'page_info' => [
                    'total',
                    'per_page',
                    'first_page',
                    'current_page',
                    'last_page',
                    'first_page_url',
                    'last_page_url',
                    'next_page_url',
                    'prev_page_url',
                    'self_page_url',
                    'count',
                    'from',
                    'to',
                ],
                'errors',
                'data' => [
                    'message',
                    'item' => [
                        'id',
                        'name',
                        'email',
                        'status',
                        'position',
                        'created_at',
                        'updated_at',
                    ],
                    'items',
                    'additional'
                ]
            ]);
    }

    /**
     *
     * @return void
     */
    public function testEditUserReturningSpecificResponseAndStatus()
    {
        $statuses = [
            'active',
            'inactive'
        ];

        $positions = [
            'admin',
            'staff'
        ];

        $faker = \Faker\Factory::create();
        $email = $faker->email;

        $user = User::query()->create([
            "name" => $faker->name,
            "email" => $email,
            "status" => $statuses[rand(0,1)],
            "position" => $positions[rand(0,1)],
            "password" => rand(10000000, 99999999)
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id
        ]);

        $response = $this->putJson(config('settings.APP_URL').'/api/v1/users/edit/'.$user->id, [
            "name" => $faker->name,
            "email" => $email,
            "status" => $statuses[rand(0,1)],
            "position" => $positions[rand(0,1)],
            "password" => rand(10000000, 99999999)
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'meta' => [
                    'code',
                    'api_version',
                    'method',
                    'message',
                ],
                'page_info' => [
                    'total',
                    'per_page',
                    'first_page',
                    'current_page',
                    'last_page',
                    'first_page_url',
                    'last_page_url',
                    'next_page_url',
                    'prev_page_url',
                    'self_page_url',
                    'count',
                    'from',
                    'to',
                ],
                'errors',
                'data' => [
                    'message',
                    'item' => [
                        'id',
                        'name',
                        'email',
                        'status',
                        'position',
                        'created_at',
                        'updated_at',
                    ],
                    'items',
                    'additional'
                ]
            ]);
    }

    /**
     *
     * @return void
     */
    public function testShowUserDetailsReturningSpecificResponseAndStatus()
    {
        $statuses = [
            'active',
            'inactive'
        ];

        $positions = [
            'admin',
            'staff'
        ];

        $faker = \Faker\Factory::create();
        $email = $faker->email;

        $user = User::query()->create([
            "name" => $faker->name,
            "email" => $email,
            "status" => $statuses[rand(0,1)],
            "position" => $positions[rand(0,1)],
            "password" => rand(10000000, 99999999)
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id
        ]);

        $response = $this->get(config('settings.APP_URL').'/api/v1/users/show/'.$user->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'meta' => [
                    'code',
                    'api_version',
                    'method',
                    'message',
                ],
                'page_info' => [
                    'total',
                    'per_page',
                    'first_page',
                    'current_page',
                    'last_page',
                    'first_page_url',
                    'last_page_url',
                    'next_page_url',
                    'prev_page_url',
                    'self_page_url',
                    'count',
                    'from',
                    'to',
                ],
                'errors',
                'data' => [
                    'message',
                    'item' => [
                        'id',
                        'name',
                        'email',
                        'status',
                        'position',
                        'created_at',
                        'updated_at',
                    ],
                    'items',
                    'additional'
                ]
            ]);
    }

    /**
     *
     * @return void
     */
    public function testDeleteUserReturningSpecificResponseAndStatus()
    {
        $statuses = [
            'active',
            'inactive'
        ];

        $positions = [
            'admin',
            'staff'
        ];

        $faker = \Faker\Factory::create();
        $email = $faker->email;

        $user = User::query()->create([
            "name" => $faker->name,
            "email" => $email,
            "status" => $statuses[rand(0,1)],
            "position" => $positions[rand(0,1)],
            "password" => rand(10000000, 99999999)
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id
        ]);

        $response = $this->delete(config('settings.APP_URL').'/api/v1/users/delete/'.$user->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'meta' => [
                    'code',
                    'api_version',
                    'method',
                    'message',
                ],
                'page_info' => [
                    'total',
                    'per_page',
                    'first_page',
                    'current_page',
                    'last_page',
                    'first_page_url',
                    'last_page_url',
                    'next_page_url',
                    'prev_page_url',
                    'self_page_url',
                    'count',
                    'from',
                    'to',
                ],
                'errors',
                'data' => [
                    'message',
                    'item',
                    'items',
                    'additional'
                ]
            ]);
    }

    /**
     *
     * @return void
     */
    public function testCreateNewUserWithExistingEmailReturningSpecificResponseAndStatus()
    {
        $statuses = [
            'active',
            'inactive'
        ];

        $positions = [
            'admin',
            'staff'
        ];

        $faker = \Faker\Factory::create();
        $email = $faker->email;

        $this->postJson(config('settings.APP_URL').'/api/v1/users/create', [
            "name" => $faker->name,
            "email" => $email,
            "status" => $statuses[rand(0,1)],
            "position" => $positions[rand(0,1)],
            "password" => rand(10000000, 99999999)
        ]);

        $this->assertDatabaseHas('users', [
            'email' => $email
        ]);

        $response = $this->postJson(config('settings.APP_URL').'/api/v1/users/create', [
            "name" => $faker->name,
            "email" => $email,
            "status" => $statuses[rand(0,1)],
            "position" => $positions[rand(0,1)],
            "password" => rand(10000000, 99999999)
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonStructure([
                'meta' => [
                    'code',
                    'api_version',
                    'method',
                    'message',
                ],
                'page_info' => [
                    'total',
                    'per_page',
                    'first_page',
                    'current_page',
                    'last_page',
                    'first_page_url',
                    'last_page_url',
                    'next_page_url',
                    'prev_page_url',
                    'self_page_url',
                    'count',
                    'from',
                    'to',
                ],
                'errors' => [
                    [
                        'email'
                    ]
                ],
                'data' => [
                    'message',
                    'item',
                    'items',
                    'additional'
                ]
            ]);
    }

    /**
     *
     * @return void
     */
    public function testShowNotExistingUserReturningSpecificResponseAndStatus()
    {
        $uuid = Uuid::generate(4)->string;

        $response = $this->get(config('settings.APP_URL').'/api/v1/users/show/'.$uuid);

        $response
            ->assertStatus(500)
            ->assertJsonStructure([
                'meta' => [
                    'code',
                    'api_version',
                    'method',
                    'message',
                ],
                'page_info' => [
                    'total',
                    'per_page',
                    'first_page',
                    'current_page',
                    'last_page',
                    'first_page_url',
                    'last_page_url',
                    'next_page_url',
                    'prev_page_url',
                    'self_page_url',
                    'count',
                    'from',
                    'to',
                ],
                'errors' => [
                    [
                        'errors'
                    ]
                ],
                'data' => [
                    'message',
                    'item',
                    'items',
                    'additional'
                ]
            ]);
    }

    /**
     *
     * @return void
     */
    public function testEditNotExistingUserReturningSpecificResponseAndStatus()
    {
        $uuid = Uuid::generate(4)->string;
        $faker = \Faker\Factory::create();
        $statuses = [
            'active',
            'inactive'
        ];

        $positions = [
            'admin',
            'staff'
        ];
        $email = $faker->email;

        $response = $this->putJson(config('settings.APP_URL').'/api/v1/users/edit/'.$uuid, [
            "name" => $faker->name,
            "email" => $email,
            "status" => $statuses[rand(0,1)],
            "position" => $positions[rand(0,1)],
            "password" => rand(10000000, 99999999)
        ]);

        $response
            ->assertStatus(500)
            ->assertJsonStructure([
                'meta' => [
                    'code',
                    'api_version',
                    'method',
                    'message',
                ],
                'page_info' => [
                    'total',
                    'per_page',
                    'first_page',
                    'current_page',
                    'last_page',
                    'first_page_url',
                    'last_page_url',
                    'next_page_url',
                    'prev_page_url',
                    'self_page_url',
                    'count',
                    'from',
                    'to',
                ],
                'errors' => [
                    [
                        'errors'
                    ]
                ],
                'data' => [
                    'message',
                    'item',
                    'items',
                    'additional'
                ]
            ]);
    }

    /**
     *
     * @return void
     */
    public function testDeleteNotExistingUserReturningSpecificResponseAndStatus()
    {
        $uuid = Uuid::generate(4)->string;

        $response = $this->delete(config('settings.APP_URL').'/api/v1/users/delete/'.$uuid);

        $response
            ->assertStatus(500)
            ->assertJsonStructure([
                'meta' => [
                    'code',
                    'api_version',
                    'method',
                    'message',
                ],
                'page_info' => [
                    'total',
                    'per_page',
                    'first_page',
                    'current_page',
                    'last_page',
                    'first_page_url',
                    'last_page_url',
                    'next_page_url',
                    'prev_page_url',
                    'self_page_url',
                    'count',
                    'from',
                    'to',
                ],
                'errors' => [
                    [
                        'errors'
                    ]
                ],
                'data' => [
                    'message',
                    'item',
                    'items',
                    'additional'
                ]
            ]);
    }
}
