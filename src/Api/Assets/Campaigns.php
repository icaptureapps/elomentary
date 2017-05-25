<?php

/**
 * @file
 * Contains \Eloqua\Api\Assets\ExternalTypes.
 */

namespace Eloqua\Api\Assets;

use Eloqua\Api\AbstractApi;
use Eloqua\Api\ReadableInterface;
use Eloqua\Api\SearchableInterface;
use Eloqua\Exception\InvalidArgumentException;

/**
 * Eloqua External Asset Types
 */
class Campaigns extends AbstractApi implements SearchableInterface, ReadableInterface {

  /**
   * {@inheritdoc}   
  */  
  public function search($search, array $options = array()) {
    return $this->get('assets/campaigns', array_merge(array( 
      'search' => $search,     
      'depth' => 'complete',
    ), $options));
  }
  

  /**
   * {@inheritdoc}
   */
  public function show($id, $depth = 'complete', $extensions = null) {
    return $this->get('assets/campaign/' . rawurlencode($id), array(
      'depth' => $depth,
      'extensions' => $extensions,
    ));
  }

  
}
