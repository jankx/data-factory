<?php

namespace Jankx\DataFactory\Registry;

use Jankx\DataFactory\Configs\TaxonomiesConfigurations;
use Jankx\GlobalConfigs;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class TaxonomiesRegistry
{
    public function registerTaxonomies()
    {
        $encoders    = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer  = new Serializer($normalizers, $encoders);

        $taxonomiesConfigs = GlobalConfigs::get('taxonomies', []);
        foreach ($taxonomiesConfigs as $configs) {
            /**
             * @var \Jankx\DataFactory\Configs\TaxonomiesConfigurations
             */
            $taxonomiesConfig = $serializer->denormalize($configs, TaxonomiesConfigurations::class, 'json');

            register_taxonomy(
                $taxonomiesConfig->getType(),
                $taxonomiesConfig->getPostTypes(),
                $taxonomiesConfig->getOptions()
            );
        }
    }
}
