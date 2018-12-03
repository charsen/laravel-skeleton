<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FormWidgetCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * - require        : 是否必填，默认为 true
     * - label          : label, 默认从多语言 validation.attributes 中取值
     * - widget_type    : 建议的控件类型，默认为 text
     * - widget_status  : 控件状态，默认为 normal, 可选 { normal, readonly, disabled, hidden }
     * - placeholder    : 默认为空
     * - help           : 控件附加的提示文本内容
     * - append_attr    : 其它附加属性
     * - options        : 数据，可能是 select options ，radio, checkbox ...
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection = $this->collection->map(function ($item) {
            $item['require']       = $item['require'] ?? TRUE;
            $item['label']         = $item['label'] ?? __('validation.attributes.' . $item['field_name']);
            $item['placeholder']   = $item['placeholder'] ?? '';
            $item['widget_type']   = $item['widget_type'] ?? 'text';
            $item['widget_status'] = $item['widget_status'] ?? 'normal';
            $item['help']          = $item['help'] ?? '';
            
            if (isset($item['options']) AND $item['widget_type'] != 'tree')
            {
                $item['options'] = collect($item['options'])->map(function ($item, $key) {
                    return [
                        'value' => $key,
                        'label' => __('model.' . $item),
                    ];
                });
            }
            return $item;
        });

        return $this->collection->keyBy('field_name')->all();
    }
}
