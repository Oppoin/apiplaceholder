<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $address_street
 * @property string $address_suite
 * @property string $address_city
 * @property string $address_zipcode
 * @property float $address_geo_lat
 * @property float $address_geo_lng
 * @property string $phone
 * @property string $website
 * @property string $company_name
 * @property string $company_catchPhrase
 * @property string $company_bs
 */
class User extends Entity
{

}
