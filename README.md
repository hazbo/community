# Community

Community is a small and simple dependency injection container for PHP 5.3.0 +

  - PSR-0 compliant
  - Less than 80 lines of code
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
    
Here, we have created out community object then have used an anonymous function to return an object of our new class `World` using `set`

We have then used `get` to access our new object via the container, and can call method `sayHello()` with it.

This is just a very basic example, but it can be used in all sorts of ways.

### Notes
Each object will only actually be created inside the container when we need to use it, as appose to when it is initially assigned.