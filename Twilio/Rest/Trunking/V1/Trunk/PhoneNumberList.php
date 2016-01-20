<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Trunking\V1\Trunk;

use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

class PhoneNumberList extends ListResource {
    /**
     * Construct the PhoneNumberList
     * 
     * @param Version $version Version that contains the resource
     * @param string $trunkSid The trunk_sid
     * @return PhoneNumberList 
     */
    public function __construct(Version $version, $trunkSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'trunkSid' => $trunkSid,
        );
        
        $this->uri = '/Trunks/' . $trunkSid . '/PhoneNumbers';
    }

    /**
     * Create a new PhoneNumberInstance
     * 
     * @param string $phoneNumberSid The phone_number_sid
     * @return PhoneNumberInstance Newly created PhoneNumberInstance
     */
    public function create($phoneNumberSid) {
        $data = Values::of(array(
            'PhoneNumberSid' => $phoneNumberSid,
        ));
        
        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new PhoneNumberInstance(
            $this->version,
            $payload,
            $this->solution['trunkSid']
        );
    }

    /**
     * Constructs a PhoneNumberContext
     * 
     * @param string $sid The sid
     * @return PhoneNumberContext 
     */
    public function getContext($sid) {
        return new PhoneNumberContext(
            $this->version,
            $this->solution['trunkSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Trunking.V1.PhoneNumberList]';
    }
}