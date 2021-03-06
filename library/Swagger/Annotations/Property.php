<?php
namespace Swagger\Annotations;

/**
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 *             Copyright [2013] [Robert Allen]
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @package
 * @category
 * @subpackage
 */
use Swagger\Logger;
use Swagger\Swagger;

/**
 * @package
 * @category
 * @subpackage
 *
 * @Annotation
 */
class Property extends DataType
{

    public function jsonSerialize()
    {
        $data = parent::jsonSerialize();
        unset($data['name']);
        unset($data['required']);
        if ($this->type !== 'array' && Swagger::isPrimitive($this->type) === false) {
            $data['$ref'] = $this->type;
            unset($data['type']);
        }
        return $data;
    }

}
