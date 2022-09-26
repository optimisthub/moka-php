<?php

namespace Moka\Model;

interface ModelInterface
{
    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray();
}
