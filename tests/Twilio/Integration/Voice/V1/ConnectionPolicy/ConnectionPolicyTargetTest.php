<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Voice\V1\ConnectionPolicy;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class ConnectionPolicyTargetTest extends HolodeckTestCase {
    public function testCreateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->voice->v1->connectionPolicies("NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                    ->targets->create("https://example.com");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = ['Target' => "https://example.com", ];

        $this->assertRequest(new Request(
            'post',
            'https://voice.twilio.com/v1/ConnectionPolicies/NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Targets',
            null,
            $values
        ));
    }

    public function testCreateResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "connection_policy_sid": "NYaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "NEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "friendly_name",
                "target": "sip:sip-box.com:1234",
                "priority": 1,
                "weight": 20,
                "enabled": true,
                "date_created": "2020-03-18T23:31:36Z",
                "date_updated": "2020-03-18T23:31:36Z",
                "url": "https://voice.twilio.com/v1/ConnectionPolicies/NYaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Targets/NEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->voice->v1->connectionPolicies("NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                          ->targets->create("https://example.com");

        $this->assertNotNull($actual);
    }

    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->voice->v1->connectionPolicies("NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                    ->targets("NEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://voice.twilio.com/v1/ConnectionPolicies/NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Targets/NEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "connection_policy_sid": "NYaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "NEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "friendly_name",
                "target": "sip:sip-box.com:1234",
                "priority": 1,
                "weight": 20,
                "enabled": true,
                "date_created": "2020-03-18T23:31:36Z",
                "date_updated": "2020-03-18T23:31:37Z",
                "url": "https://voice.twilio.com/v1/ConnectionPolicies/NYaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Targets/NEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->voice->v1->connectionPolicies("NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                          ->targets("NEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }

    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->voice->v1->connectionPolicies("NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                    ->targets->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://voice.twilio.com/v1/ConnectionPolicies/NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Targets'
        ));
    }

    public function testReadFullResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://voice.twilio.com/v1/ConnectionPolicies/NYaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Targets?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://voice.twilio.com/v1/ConnectionPolicies/NYaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Targets?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "targets"
                },
                "targets": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "connection_policy_sid": "NYaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "sid": "NEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "friendly_name": "friendly_name",
                        "target": "sip:sip-box.com:1234",
                        "priority": 1,
                        "weight": 20,
                        "enabled": true,
                        "date_created": "2020-03-18T23:31:36Z",
                        "date_updated": "2020-03-18T23:31:37Z",
                        "url": "https://voice.twilio.com/v1/ConnectionPolicies/NYaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Targets/NEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                    }
                ]
            }
            '
        ));

        $actual = $this->twilio->voice->v1->connectionPolicies("NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                          ->targets->read();

        $this->assertGreaterThan(0, \count($actual));
    }

    public function testReadEmptyResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://voice.twilio.com/v1/ConnectionPolicies/NYaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Targets?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://voice.twilio.com/v1/ConnectionPolicies/NYaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Targets?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "targets"
                },
                "targets": []
            }
            '
        ));

        $actual = $this->twilio->voice->v1->connectionPolicies("NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                          ->targets->read();

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->voice->v1->connectionPolicies("NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                    ->targets("NEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://voice.twilio.com/v1/ConnectionPolicies/NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Targets/NEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testUpdateResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "connection_policy_sid": "NYaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "NEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "updated_name",
                "target": "sip:sip-updated.com:4321",
                "priority": 2,
                "weight": 10,
                "enabled": false,
                "date_created": "2020-03-18T23:31:36Z",
                "date_updated": "2020-03-18T23:31:37Z",
                "url": "https://voice.twilio.com/v1/ConnectionPolicies/NYaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Targets/NEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->voice->v1->connectionPolicies("NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                          ->targets("NEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update();

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->voice->v1->connectionPolicies("NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                    ->targets("NEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://voice.twilio.com/v1/ConnectionPolicies/NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Targets/NEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testDeleteResponse(): void {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->voice->v1->connectionPolicies("NYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                          ->targets("NEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();

        $this->assertTrue($actual);
    }
}