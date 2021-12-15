<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v8/common/policy.proto

namespace Google\Ads\GoogleAds\V8\Common\PolicyTopicEvidence;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A list of strings found in a destination page that caused a policy
 * finding.
 *
 * Generated from protobuf message <code>google.ads.googleads.v8.common.PolicyTopicEvidence.DestinationTextList</code>
 */
class DestinationTextList extends \Google\Protobuf\Internal\Message
{
    /**
     * List of text found in the resource's destination page.
     *
     * Generated from protobuf field <code>repeated string destination_texts = 2;</code>
     */
    private $destination_texts;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $destination_texts
     *           List of text found in the resource's destination page.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V8\Common\Policy::initOnce();
        parent::__construct($data);
    }

    /**
     * List of text found in the resource's destination page.
     *
     * Generated from protobuf field <code>repeated string destination_texts = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getDestinationTexts()
    {
        return $this->destination_texts;
    }

    /**
     * List of text found in the resource's destination page.
     *
     * Generated from protobuf field <code>repeated string destination_texts = 2;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setDestinationTexts($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->destination_texts = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DestinationTextList::class, \Google\Ads\GoogleAds\V8\Common\PolicyTopicEvidence_DestinationTextList::class);

