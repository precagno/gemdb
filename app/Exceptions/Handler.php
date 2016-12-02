<?php

namespace App\Exceptions;

/*-- Si la excepcion lanzada es de tipo HttpException primero busca una vista en errors --*/
/*-- buscando el nombre d ela vista acorde al status code(ejemplo 404),si no la encuentra , --*/
/*-- arma una respuesta standard(codigo de la excepcion),si la excepcion no es de tipo HttpException --*/
/*-- arma una respuesta standard --*/

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Request;
use App\Custom\CustomResponse;
use Log;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    
    use CustomResponse;
    
    protected $dontReport = [
        HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request,Exception $e)
    {
        //Log::info($e->getMessage());
        
        if($request->ajax())
        {
            return $this->renderAjaxHttpException($e);
        }else
        {
            $debug=env("APP_DEBUG");
        
            if(!$debug)
            {
                return $this->renderException($e);
            }

            return parent::render($request,$e);
        }
 
    }
    
    /*-- Renderiza una exception Ajax --*/
    private function renderAjaxHttpException(Exception $e)
    {
        $mensaje="Se produjo un error interno: ".$e->getMessage();
        
        return $this->json_fail_response("Error interno",$mensaje);
    }
    
    /*-- Renderiza una respuesta al browser si la variable de entorno APP_DEBUG es false --*/
    private function renderException(Exception $e)
    {
        $code="internal_error";
        
        if($this->isHttpException($e))
        {
            switch($e->getStatusCode())
            {
                case 404:$code="page_not_found";break;
                
                case 503:$code="503";break;
                
                default:$code="internal_error";break;
            }
        }
        if($this->isModelNotFoundException($e))
        {
            $code="model_not_found";
        }
        
        return response()->view("errors.$code");
    }
    
    /*-- Metodo que chequea sì la excepcion lanzada es de tipo ModelNotFoundException--*/
    private function isModelNotFoundException(Exception $e)
    {
        return $e instanceof ModelNotFoundException;
    }
    
}