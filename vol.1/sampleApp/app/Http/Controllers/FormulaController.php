<?php
namespace App\Http\Controllers;

use App\Engines\EngineInterface;

/**
 * このコントローラはcontextual bindingで
 * コンストラクタインジェクションを利用したサンプルです。
 * コンテナへの登録方法は下記を参照してください。
 * \App\Http\Controllers\RallyControllerと同一のインターフェースを利用して、
 * 異なる具象クラスを利用しています
 * @see \App\Providers\AppServiceProvider
 *
 * Class FormulaController
 * @package App\Http\Controllers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class FormulaController extends Controller
{

    /** @var EngineInterface  */
    protected $engine;

    /**
     * @param EngineInterface $engine
     */
    public function __construct(EngineInterface $engine)
    {
        $this->engine = $engine;
    }

    /**
     * uri : "/f1" [GET]
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
         return response()->json(['engine' => $this->engine->getType()]);
    }
}
