<?php

namespace Magento\CustomCoupon\Model\ResourceModel\Order\Grid;

/**
 * Class Collection
 * @package Module\CustopCoupon\Model\ResourceModel\Order\Grid
 */
class Collection extends \Magento\Sales\Model\ResourceModel\Order\Grid\Collection
{

    /**
     * @return $this|\Magento\Sales\Model\ResourceModel\Order\Grid\Collection|Collection|void
     */
    public function _initSelect()
    {
        parent::_initSelect();

        $this->getSelect()
            ->joinLeft(
                ['orders' => 'sales_order'],
                "(main_table.entity_id = orders.entity_id)",
                [
                    'orders.coupon_code as coupon_code',
                    'orders.discount_amount AS discount_amount',
                ]
            );

        return $this;
    }

}
