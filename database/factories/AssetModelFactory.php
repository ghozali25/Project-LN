<?php

namespace Database\Factories;

use App\Models\AssetModel;
use App\Models\CustomField;
use App\Models\CustomFieldset;
use App\Models\Depreciation;
use App\Models\Manufacturer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class AssetModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssetModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_by' => User::factory()->superuser(),
            'name' => $this->faker->catchPhrase(),
            'category_id' => Category::factory(),
            'model_number' => $this->faker->creditCardNumber(),
            'notes' => 'Created by demo seeder',

        ];
    }

    public function mbp13Model()
    {
        return $this->state(function () {
            return [
                'name' => 'Macbook Pro 13"',
                'category_id' => function () {
                    return Category::where('name', 'Laptops')->first() ?? Category::factory()->assetLaptopCategory();
                },
                'eol' => '36',
                'depreciation_id' => function () {
                    return Depreciation::where('name', 'Computer Depreciation')->first() ?? Depreciation::factory()->computer();
                },
                'image' => 'mbp.jpg',
                'fieldset_id' => function () {
                    return CustomFieldset::where('name', 'Laptops and Desktops')->first() ?? CustomFieldset::factory()->computer();
                },
            ];
        });
    }

    public function mbpAirModel()
    {
        return $this->state(function () {
            return [
                'name' => 'Macbook Air',
                'category_id' => function () {
                    return Category::where('name', 'Laptops')->first() ?? Category::factory()->assetLaptopCategory();
                },
                'manufacturer_id' => function () {
                    return Manufacturer::where('name', 'Apple')->first() ?? Manufacturer::factory()->apple();
                },
                'eol' => '36',
                'depreciation_id' => function () {
                    return Depreciation::where('name', 'Computer Depreciation')->first() ?? Depreciation::factory()->computer();
                },
                'image' => 'macbookair.jpg',
                'fieldset_id' => function () {
                    return CustomFieldset::where('name', 'Laptops and Desktops')->first() ?? CustomFieldset::factory()->computer();
                },
            ];
        });
    }

    public function surfaceModel()
    {
        return $this->state(function () {
            return [
                'name' => 'Surface',
                'category_id' => function () {
                    return Category::where('name', 'Laptops')->first() ?? Category::factory()->assetLaptopCategory();
                },
                'manufacturer_id' => function () {
                    return Manufacturer::where('name', 'Microsoft')->first() ?? Manufacturer::factory()->microsoft();
                },
                'eol' => '36',
                'depreciation_id' => function () {
                    return Depreciation::where('name', 'Computer Depreciation')->first() ?? Depreciation::factory()->computer();
                },
                'image' => 'surface.jpg',
                'fieldset_id' => function () {
                    return CustomFieldset::where('name', 'Laptops and Desktops')->first() ?? CustomFieldset::factory()->computer();
                },
            ];
        });
    }

    public function xps13Model()
    {
        return $this->state(function () {
            return [
                'name' => 'XPS 13',
                'category_id' => function () {
                    return Category::where('name', 'Laptops')->first() ?? Category::factory()->assetLaptopCategory();
                },
                'manufacturer_id' => function () {
                    return Manufacturer::where('name', 'Dell')->first() ?? Manufacturer::factory()->dell();
                },
                'eol' => '36',
                'depreciation_id' => function () {
                    return Depreciation::where('name', 'Computer Depreciation')->first() ?? Depreciation::factory()->computer();
                },
                'image' => 'xps.jpg',
                'fieldset_id' => function () {
                    return CustomFieldset::where('name', 'Laptops and Desktops')->first() ?? CustomFieldset::factory()->computer();
                },
            ];
        });
    }

    public function zenbookModel()
    {
        return $this->state(function () {
            return [
                'name' => 'ZenBook UX310',
                'category_id' => function () {
                    return Category::where('name', 'Laptops')->first() ?? Category::factory()->assetLaptopCategory();
                },
                'manufacturer_id' => function () {
                    return Manufacturer::where('name', 'Asus')->first() ?? Manufacturer::factory()->asus();
                },
                'eol' => '36',
                'depreciation_id' => function () {
                    return Depreciation::where('name', 'Computer Depreciation')->first() ?? Depreciation::factory()->computer();
                },
                'image' => 'zenbook.jpg',
                'fieldset_id' => function () {
                    return CustomFieldset::where('name', 'Laptops and Desktops')->first() ?? CustomFieldset::factory()->computer();
                },
            ];
        });
    }

    public function spectreModel()
    {
        return $this->state(function () {
            return [
                'name' => 'Spectre',
                'category_id' => function () {
                    return Category::where('name', 'Laptops')->first() ?? Category::factory()->assetLaptopCategory();
                },
                'manufacturer_id' => function () {
                    return Manufacturer::where('name', 'HP')->first() ?? Manufacturer::factory()->hp();
                },
                'eol' => '36',
                'depreciation_id' => function () {
                    return Depreciation::where('name', 'Computer Depreciation')->first() ?? Depreciation::factory()->computer();
                },
                'image' => 'spectre.jpg',
                'fieldset_id' => function () {
                    return CustomFieldset::where('name', 'Laptops and Desktops')->first() ?? CustomFieldset::factory()->computer();
                },
            ];
        });
    }

    public function yogaModel()
    {
        return $this->state(function () {
            return [
                'name' => 'Yoga 910',
                'category_id' => function () {
                    return Category::where('name', 'Laptops')->first() ?? Category::factory()->assetLaptopCategory();
                },
                'manufacturer_id' => function () {
                    return Manufacturer::where('name', 'Lenovo')->first() ?? Manufacturer::factory()->lenovo();
                },
                'eol' => '36',
                'depreciation_id' => function () {
                    return Depreciation::where('name', 'Computer Depreciation')->first() ?? Depreciation::factory()->computer();
                },
                'image' => 'yoga.png',
                'fieldset_id' => function () {
                    return CustomFieldset::where('name', 'Laptops and Desktops')->first() ?? CustomFieldset::factory()->computer();
                },
            ];
        });
    }


    public function hasEncryptedCustomField(CustomField $field = null)
    {
        return $this->state(function () use ($field) {
            return [
                'fieldset_id' => CustomFieldset::factory()->hasEncryptedCustomField($field),
            ];
        });
    }

    public function hasMultipleCustomFields(array $fields = null)
    {
        return $this->state(function () use ($fields) {
            return [
                'fieldset_id' => CustomFieldset::factory()->hasMultipleCustomFields($fields),
            ];
        });
    }

    public function doesNotRequireAcceptance()
    {
        return $this->state(function () {
            return [
                'category_id' => Category::factory()->doesNotRequireAcceptance(),
            ];
        });
    }
}
