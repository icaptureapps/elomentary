<?php

/**
 * @file
 * Contains \Eloqua\Api\FormData.
 */

namespace Eloqua\Api\Data;

use Eloqua\Api\AbstractApi;
//use Eloqua\Api\CreatableInterface;
//use Eloqua\Api\DestroyableInterface;
use Eloqua\Api\ReadableInterface;
//use Eloqua\Api\SearchableInterface;
use Eloqua\Api\UpdateableInterface;
use Eloqua\Exception\InvalidArgumentException;


/**
 * Eloqua Contact.
 */
class FormData extends AbstractApi implements UpdateableInterface, ReadableInterface {

  /**
   * {@inheritdoc}
   */
  public function show($id, $depth = 'complete', $extensions = null) {
    return $this->get('data/form/' . rawurlencode($id), array(
      'depth' => $depth
    ));
  }
  

  /**
   * {@inheritdoc}
   *
   * @throws InvalidArgumentException
   * @see http://docs.oracle.com/cloud/latest/marketingcs_gs/OMCAB/index.html#Developers/RESTAPI/2.0 Endpoints/External activities/externalActivities-API.htm
   */
  public function update($id, $form_data) {
    /*
    if (!isset($contact_data['name'])) {
      throw new InvalidArgumentException('External Activity: name is required.');
    }
    if (!isset($contact_data['assetName'])) {
      throw new InvalidArgumentException('External Activity: assetName is required.');
    }
    if (!isset($contact_data['assetType'])) {
      throw new InvalidArgumentException('External Activity: assetType is required.');
    }
    if (!isset($contact_data['activityType'])) {
      throw new InvalidArgumentException('External Activity: activityType is required.');
    }
    if (!isset($contact_data['contactId'])) {
      throw new InvalidArgumentException('External Activity: contactId is required.');
    }
    if (!isset($contact_data['activityDate'])) { // UNIX date
      throw new InvalidArgumentException('External Activity: activityDate is required.');
    }
    */
    return $this->post('data/form/'. rawurlencode($id) , $form_data);
  }

 
}
