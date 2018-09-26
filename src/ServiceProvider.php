<?php
namespace AliyunMNS;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Client::class, function(){
            return new Client(config('services.aliyunmns.ENDPOINT'),config('services.aliyunmns.ACCESSID'),config('services.aliyunmns.ACCESSKEY'));
        });

        $this->app->alias(Client::class, 'AliyunMNSClient');
    }

    public function provides()
    {
        return [Client::class, 'AliyunMNSClient'];
    }
}