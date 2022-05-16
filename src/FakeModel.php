<?php

namespace AhmetBarut\LaravelAutoFactory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class FakeModel extends Model
{
    use HasFactory;

    public function getTable()
    {
        return Cache::get('table');
    }
    
    protected static function newFactory()
    {
        $newInstance = new static();
        $newInstance->setTable(Cache::get('table'));

        return CreateFactoryForModel::new(
            $newInstance->getColumnsType()
        );
    }
    
    public function getColumnListing()
    {
        return Schema::getColumnListing($this->table);
    }

    public function getColumnType($column)
    {
        return Schema::getColumnType($this->table, $column);
    }

    public function getColumnsType(): array
    {
        $columns = collect();

        foreach ($this->getColumnListing() as $key => $column) {
            $columns->push([
                'name' => $column,
                'type' => $this->getColumnType($column),
                'faker' => $this->getFaker($column),
            ]);
        }

        return $columns->filter(function ($column) {
            return $column['faker'] !== null;
        })->toArray();
    }

    public function getFaker($column): ?string
    {
        return config('auto-factory.faker_types.' . $this->getColumnType($column));
    }
}
