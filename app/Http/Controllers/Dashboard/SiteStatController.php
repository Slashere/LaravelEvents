<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Site;
use App\Models\SiteStat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteStatController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'click_pointer' => 'required|string|max:255|',
            'realtime_created_at' => 'required|timestamp|',
        ]);

        SiteStat::create([
            'click_pointer' => $request['click_pointer'],
            'realtime_created_at' => $request['realtime_created_at'],
        ]);

        return redirect()->route('site_stats_show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site::id  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siteStats = SiteStat::where('site_id', $id)->get();
        return view('site_stats.show', compact('siteStats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteStat  $siteStat
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteStat $siteStat)
    {
        return view('site_stats_edit', compact('siteStat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteStat  $siteStat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteStat $siteStat)
    {
        $this->validate($request, [
            'click_pointer' => 'required|string|max:255|',
            'realtime_created_at' => 'required|timestamp|',
        ]);

        $siteStat->update([
            'click_pointer' => $request['click_pointer'],
            'realtime_created_at' => $request['realtime_created_at'],
        ]);

        return redirect()->route('site_stats_show', $siteStat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteStat  $siteStat
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteStat $siteStat)
    {
       $siteStat->delete();

       return redirect()->route('site_stats_index');
    }
}
