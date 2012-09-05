# Community

Community is a small and simple dependency injection container for PHP 5.3.0 +

  - PSR-0 compliant
  - Less than 100 lines of code
  - Easy to use

## Installation
Add `outglow/community` to your composer.json file

    {
        "require" : {
            "outglow/community" : "dev-master"
        }
    }
Then run: `php composer.phar install`
(NOTE: An update may be required first)

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
    
    use Outglow\Component\Community;
    
    $community = new Community\Community();
    
    $community->set('world', function() {
        return new World();
    });
    
    $world = $community->get('world');
    
    echo $world->sayHello();
    
Here, we have created our community object then have used an anonymous function to return an object of our new class `World` using `set`

We have then used `get` to access our new object via the container, and can call method `sayHello()` with it.

This is just a very basic example, but it can be used in all sorts of ways.

### Extended
We can also choose whether or not each time we `get` our community object, whether or not it is a new instance
of that class, or a shared one, meaning it will only ever instantiate one instance of that class which will be stored
in your container.

    $community->set('world', function() {
        return new World();
    }, true);

Passing in true (above) will tell community that we want to instantiate a new instance of that class each time we use
the `get` method, where as leaving it blank:

    $community->set('world', function() {
        return new World();
    });

Will just les us use the same instance of that object each time.