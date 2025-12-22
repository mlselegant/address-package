<?php

namespace Manohar\Address\Models;

use Illuminate\Database\Eloquent\Model;

abstract class ReadOnlyModel extends Model
{
    /**
     * Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * The connection name for the model.
     */
    protected $connection = 'address';

    /**
     * Boot the model
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->throwReadOnlyException('create');
        });

        static::updating(function ($model) {
            $model->throwReadOnlyException('update');
        });

        static::deleting(function ($model) {
            $model->throwReadOnlyException('delete');
        });
    }

    /**
     * Throw read-only exception
     */
    protected function throwReadOnlyException($operation)
    {
        $modelName = class_basename($this);
        throw new \Manohar\Address\Exceptions\ReadOnlyModelException(
            "Cannot {$operation} {$modelName}. This is read-only reference data."
        );
    }

    /**
     * Override save method
     */
    public function save(array $options = [])
    {
        $this->throwReadOnlyException('save');
    }

    /**
     * Override update method
     */
    public function update(array $attributes = [], array $options = [])
    {
        $this->throwReadOnlyException('update');
    }

    /**
     * Override delete method
     */
    public function delete()
    {
        $this->throwReadOnlyException('delete');
    }

    /**
     * Prevent mass assignment
     */
    public static function create(array $attributes = [])
    {
        (new static())->throwReadOnlyException('create');
    }
}
