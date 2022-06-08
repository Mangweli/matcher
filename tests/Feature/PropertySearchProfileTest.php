<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\SearchProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Traits\UtilityFunctions;
use App\Repositories\Interfaces\SearchProfileInterface;

class PropertySearchProfileTest extends TestCase
{
    use RefreshDatabase, UtilityFunctions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->searchProfileRepository = $this->app->make(SearchProfileInterface::class);
    }

    public function test_a_valid_property_id_needs_to_be_provided_inorder_to_search_through_search_profile()
    {
        $response = $this->get('/api/match/1');

        $response->assertStatus(404);
    }

    public function test_valid_response_is_returned_if_property_exits_with_no_search_profile() {
        $this->assertEquals(0, Property::count());
        $property = Property::factory()->create();

        $this->assertEquals(1, Property::count());
        $this->assertEquals(0, SearchProfile::count());

        $response = $this->get('/api/match/'.$property->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['success', 'message']);
        $response->assertJson(
                                [
                                    'success' => false,
                                    'message' => 'No Search Profile Found'
                                ]
                            );
    }

    public function test_able_to_retrieve_search_profiles_based_on_the_property_provided() {
        $this->assertEquals(0, Property::count());
        Property::factory(120)->create();

        SearchProfile::factory(500)->create();
        $this->assertNotEquals(0, Property::count());

        $property      = Property::inRandomOrder()->first();
        $searchProfile = $this->searchProfileRepository->getProfileMatches(json_decode($property->fields));

        $this->assertNotEquals(0, sizeOf($searchProfile));

    }

    public function test_able_to_filter_properties_based_on_property() {
        $this->withoutExceptionHandling();
        Property::factory(120)->create();
        SearchProfile::factory(500)->create();

        $this->assertNotEquals(0, Property::count());

        $property = Property::inRandomOrder()->first();
        $response = $this->get('/api/match/'.$property->id);

        $response->assertStatus(200);
        $response->assertJsonStructure([['searchProfileId', 'score', 'strictMatchesCount', 'looseMatchesCount']]);

    }
}
