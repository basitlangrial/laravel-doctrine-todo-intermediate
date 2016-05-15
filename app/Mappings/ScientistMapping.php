<?php
namespace App\Mappings;

use App\Research\Scientist;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class ScientistMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return Scientist::class;
    }

    /**
     * Load the object's metadata through the Metadata Builder object.
     *
     * @param Fluent $builder
     */
    public function map(Fluent $builder)
    {
        // This will result in an autoincremented integer
        $builder->increments('id');
        $builder->string('firstName');
        $builder->string('lastName');
        $builder->string('email');

        // Both strings will be varchars
        //$builder->string('firstName')->nullable();
        //$builder->string('lastName')->nullable();

        // This will map an association with Theory as one-to-many
        //$builder->hasMany(Theory::class, 'theories');
    }
}