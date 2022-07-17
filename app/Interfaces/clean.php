





<!-- Class/interface name	The value must be an instanceof the given class or interface.	 
self	The value must be an instanceof the same class as the one in which the type declaration is used. Can only be used in classes.	 
parent	The value must be an instanceof the parent of the class in which the type declaration is used. Can only be used in classes.	 
array	The value must be an array.	 
callable	The value must be a valid callable. Cannot be used as a class property type declaration.	 
bool	The value must be a boolean value.	 
float	The value must be a floating point number.	 
int	The value must be an integer.	 
string	The value must be a string.	 
iterable	The value must be either an array or an instanceof Traversable.	PHP 7.1.0
object	The value must be an object.	PHP 7.2.0
mixed	The value can be any value.
 -->


<!-- 
    You can use type hinting and be sure that the $breweryName will not be NULL.
    function createMicrobrewery(string $breweryName = 'Hipster Brew Co.'): void
{
    // ...
}
 -->

<!-- $name = $_GET['name'] ?? $_POST['name'] ?? 'nobody'; -->

<!-- interface Adapter
{
    public function request(string $url): Promise;
}

class AjaxAdapter implements Adapter
{
    public function request(string $url): Promise
    {
        // request and return promise
    }
}

class NodeAdapter implements Adapter
{
    public function request(string $url): Promise
    {
        // request and return promise
    }
}

class HttpRequester
{
    private $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function fetch(string $url): Promise
    {
        return $this->adapter->request($url);
    }
} -->