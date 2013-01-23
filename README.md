# Community

[![Build Status](https://travis-ci.org/harry-lawrence/community.png)](https://travis-ci.org/harry-lawrence/community)

Community is a small and simple dependency injection container for PHP 5.3.0 +

  - PSR-0 compliant
  - Easy to use
  - Stable

## Installation
Add `outglow/community` to your composer.json file

    {
        "require" : {
            "outglow/community" : "dev-master"
        }
    }
Then run: `php composer.phar install`
(NOTE: An update may be required first)

## API

    public function set(String $key, Closure $return, [ Bool $newInstance = false ])

    public function stack(Array $classes, [ Bool $newInstance = false ])

    public function get(String $key)

    public function remove(String $key)

## Usage
Let's say this is a class you would like to have access to via what will be a community object:

    <?php
        class World
        {
            public function sayHello()
            {
                return 'Hello';
            }
        }
    ?>

For quickness, I'll just include this class, but you should really be using a class loader ;)

    include('vendor/autoload.php');
    include('World.php');
    
    use Outglow\Component\Community\Community;
    
    $community = new Community();
    
    $community->set('world', function() {
        return new World();
    });
    
    $world = $community->get('world');
    
    echo $world->sayHello();
    
Here, we have created our community object then have used an anonymous function to return an object of our new class `World` using `set`

We have then used `get` to access our new object via the container, and can call method `sayHello()` with it.

This is just a very basic example, but it can be used in all sorts of ways.

### Extended
We can also choose whether or not, each time we `get` our community object, it creates a new instance
of that class, or a shared one, meaning it will only ever create one instance of that class which will be stored
in your container.

    $community->set('world', function() {
        return new World();
    }, true);

Passing in true (above) will tell community that we want to instantiate a new instance of that class each time we use
the `get` method, where as leaving it blank:

    $community->set('world', function() {
        return new World();
    });

Will just let us use the same instance of that object each time.

We can now also remove any given object from the container using the `remove` method. Continuing from the example above, this is how we would remove `world` from the container:

    $community->remove('world');

This can be done after assigning/using the world object, maybe you don't need it in the container anymore, and it will free up memory a little bit.

As of version 1.2, we can use the public method, stack. This is if you are storing a few objects
with the same configuration. It doesn't however only limit you to classes/objects. Anything can go in there,
here is an example of storing an object, and a string:

    $community->stack(array(
        'myString' => 'Hello',
        'myObject' => '\stdClass'
    ));

We pass the class through as a string, then Community creates a new object from it, if that class is available.
However, we can also just store data as a string, aslong as that string doesn't conflict with a class name. It
doesn't just have to be a string, it can be any kind of data.

### Tests
Unit tests have recently been added, along with a build file for ant. You can test by doing the following:

    $ cd /path/to/community
    $ ant

Only using phpunit?

    $ cd /path/to/community
    $ phpunit tests