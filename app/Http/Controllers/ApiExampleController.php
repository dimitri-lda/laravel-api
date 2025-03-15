<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

#[OA\Info(version: "1.0", title: "example API")]
class ApiExampleController extends Controller
{
    #[OA\Get(
        path: '/api/example',
        summary: 'example API endpoint in Laravel (swagger autoupdates)',
        tags: ['Test section'],
        responses: [
            new OA\Response(response: 200, description: "Successful response")
        ]
    )]
    public function index(Request $request)
    {
        $message = 'Hello, API! from Laravel with OpenAPI';
        if ($request->has('id')) {
            $message .= ', request id: ' . $request->input('id');
        }

        return response()->json(['message' => $message]);
    }
}
