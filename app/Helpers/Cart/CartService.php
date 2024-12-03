<?php

namespace App\Helpers\Cart;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CartService
 * Handles shopping cart operations such as adding, updating, deleting, and applying discounts.
 */
class CartService
{
    protected $cart;

    /**
     * CartService constructor.
     * Initializes the cart from the session or creates a new collection.
     */
    public function __construct()
    {
        $this->cart = session()->get('cart') ?? collect([]);
    }

    /**
     * Add related model data to the cart item if it exists.
     *
     * @param array $item The cart item.
     * @return array|null The updated cart item or null if relationships are not found.
     */
    protected function withRelationshipIfExists($item)
    {
        if (isset($item['subject_id']) && isset($item['subject_type'])) {
            $class = $item['subject_type'];
            $subject = (new $class())->find($item['subject_id']);
            $item[strtolower(class_basename($class))] = $subject;

            unset($item['subject_id'], $item['subject_type']);

            return $item;
        }

        return $item;
    }

    /**
     * Get a specific cart item by key.
     *
     * @param mixed $key The key to search (Model instance or item ID).
     * @param bool $withRelationshipIfExists Whether to include related model data.
     * @return array|null The cart item or null if not found.
     */
    public function get($key, $withRelationshipIfExists = true)
    {
        $item = $key instanceof Model
            ? $this->cart->where('subject_id', $key->id)
                         ->where('subject_type', get_class($key))
                         ->first()
            : $this->cart->firstWhere('id', $key);

        return $withRelationshipIfExists ? $this->withRelationshipIfExists($item) : $item;
    }

    /**
     * Get all cart items.
     *
     * @return \Illuminate\Support\Collection All cart items with related model data.
     */
    public function all()
    {
        return $this->cart->map(function ($item) {
            return $this->withRelationshipIfExists($item);
        });
    }

    /**
     * Add or update an item in the cart.
     *
     * @param array $value The cart item data.
     * @param Model|null $obj The related model (e.g., Product).
     * @return $this
     */
    public function put(array $value, $obj = null)
    {
        $id = $this->cart->count() + 1;

        if (!is_null($obj) && $obj instanceof Product) {
            $value = array_merge($value, [
                'id' => $id,
                'subject_id' => $obj->id,
                'subject_type' => get_class($obj),
                'discount_percent' => 0,
            ]);
        } elseif (!isset($value['id'])) {
            $value = array_merge($value, ['id' => $id]);
        }

        $this->cart->put($value['id'], $value);
        session()->put('cart', $this->cart);

        return $this;
    }

    /**
     * Check if the cart contains a specific item.
     *
     * @param mixed $key The key to search (Model instance or item ID).
     * @return bool True if the item exists, false otherwise.
     */
    public function has($key)
    {
        return $key instanceof Model
            ? $this->cart->where('subject_id', $key->id)
                         ->where('subject_type', get_class($key))
                         ->isNotEmpty()
            : $this->cart->firstWhere('id', $key) !== null;
    }

    /**
     * Delete an item from the cart.
     *
     * @param mixed $key The key to delete (Model instance or item ID).
     * @return bool True if the item was deleted, false otherwise.
     */
    public function delete($key)
    {
        if ($this->has($key)) {
            $this->cart = $this->cart->reject(function ($item) use ($key) {
                if ($key instanceof Model) {
                    return $item['subject_id'] === $key->id && $item['subject_type'] === get_class($key);
                }

                return $item['id'] == $key;
            });

            session()->put('cart', $this->cart);

            return true;
        }

        return false;
    }

    /**
     * Update the quantity or properties of an item in the cart.
     *
     * @param mixed $key The key to update (Model instance or item ID).
     * @param mixed $options The new quantity or additional data.
     * @return $this
     */
    public function update($key, $options)
    {
        if ($this->has($key)) {
            $item = collect($this->get($key, false));

            if (is_numeric($options)) {
                $item = $item->merge(['quantity' => $item['quantity'] + $options]);
            }

            $this->put($item->toArray());

            return $this;
        }
    }

    /**
     * Apply discounts to items in the cart based on a given object.
     *
     * @param object $obj The discount object with percent and associated products.
     * @return bool True after updating the cart.
     */
    public function change($obj)
    {
        $percent = $obj->percent;
        $categories = $obj->categories()->get();
        $products = $categories->flatMap(fn($item) => $item->products()->get()->toArray());

        $this->cart = $this->cart->map(function ($item) use ($percent, $obj, $products) {
            if (in_array($item['subject_id'], $obj->products->pluck('id')->toArray()) or
                in_array($item['subject_id'],
                (array_column($products->toArray(), 'id')))
            ) {
                $item['discount_percent'] = $percent;
            } else {
                $item['discount_percent'] = 0;
            }

            return $item;
        });

        session()->put('cart', $this->cart);

        return true;
    }
}
