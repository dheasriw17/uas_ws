package com.fooddeliveryboy.model

import com.google.gson.annotations.SerializedName
import java.io.Serializable

/**
 * Created on 08-05-2020.
 */
class OrderItemModel : Serializable {

    val order_item_id: String? = null
    val order_id: String? = null
    val product_id: String? = null
    val order_qty: String? = null
    val product_price: String? = null
    val discount_id: String? = null
    val discount_amount: String? = null
    val discount: String? = null
    val discount_type: String? = null
    val price: String? = null
    val product_image: String? = null
    val product_name_en: String? = null
    val product_name_ar: String? = null
    val calories: String? = null
    val calories_en: String? = null
    val calories_ar: String? = null
    val is_veg: String? = null

    @SerializedName("product_options")
    val orderItemOptionModelList: ArrayList<OrderItemOptionModel>? = null

}