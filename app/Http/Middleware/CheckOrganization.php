<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Teacher;

class CheckOrganization
{

    public function handle(Request $request, Closure $next)
    {
            $webKey = $request->header('web_key');
            $organization = Organization::where('web_key', $webKey)->first();
            if ($organization) {
                $teacher = Teacher::where('organization_id', $organization->id)->first();
                if ($teacher) {
                    return $next($request);
                }
                return response()->json(['message' => ' Has No Organization']);
        }
        return response()->json(['message' => ' Has No Organization']);
    }
}
