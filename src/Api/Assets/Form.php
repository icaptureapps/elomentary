<?php

/**
 * @file
 * Contains \Eloqua\Api\Assets\Form.
 */

namespace Eloqua\Api\Assets;

use Eloqua\Api\AbstractApi;
//use Eloqua\Api\CreatableInterface;
//use Eloqua\Api\DestroyableInterface;
use Eloqua\Api\ReadableInterface;
use Eloqua\Api\SearchableInterface;
//use Eloqua\Api\UpdateableInterface;
use Eloqua\Exception\InvalidArgumentException;

/**
 * Eloqua Email.
 */
class Form extends AbstractApi implements SearchableInterface, ReadableInterface{

  /**
   * {@inheritdoc}
   */
  public function search($search, array $options = array()) {
    return $this->get('assets/forms', array_merge(array(
      'search' => $search,
    ), $options));
  }

  /**
   * {@inheritdoc}
   */
  public function show($id, $depth = 'complete', $extensions = null) {
    return $this->get('assets/form/' . rawurlencode($id), array(
      'depth' => $depth
    ));
  }

}
