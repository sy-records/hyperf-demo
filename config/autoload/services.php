<?php
return [
    'consumers' => [
        [
            // 对应消费者类的 $serviceName
            'name' => 'CalculatorService',
            // 如果没有指定上面的 registry 配置，即为直接对指定的节点进行消费，通过下面的 nodes 参数来配置服务提供者的节点信息
            'nodes' => [
                ['host' => '127.0.0.1', 'port' => 9504],
            ],
        ]
    ],
];
