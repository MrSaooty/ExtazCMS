SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for extaz_votes
-- ----------------------------
DROP TABLE IF EXISTS `extaz_votes`;
CREATE TABLE IF NOT EXISTS `extaz_votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `reward` int(11) NOT NULL,
  `next_vote` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- ----------------------------
-- Table structure for extaz_cpages
-- ----------------------------
DROP TABLE IF EXISTS `extaz_cpages`;
CREATE TABLE IF NOT EXISTS `extaz_cpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `slug` text NOT NULL,
  `sidebar` int(11) DEFAULT NULL,
  `name` text NOT NULL,
  `content` longtext NOT NULL,
  `redirect` int(11) NOT NULL,
  `url` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- ----------------------------
-- Table structure for extaz_send_tokens_history
-- ----------------------------
DROP TABLE IF EXISTS `extaz_send_tokens_history`;
CREATE TABLE IF NOT EXISTS `extaz_send_tokens_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipper` text NOT NULL,
  `recipient` text NOT NULL,
  `nb_tokens` int(11) DEFAULT NULL,
  `loss_rate` text NOT NULL,
  `nb_tokens_with_loss_rate` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- ----------------------------
-- Table structure for extaz_shop_categories
-- ----------------------------
DROP TABLE IF EXISTS `extaz_shop_categories`;
CREATE TABLE IF NOT EXISTS `extaz_shop_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- ----------------------------
-- Records of extaz_shop_categories
-- ----------------------------
INSERT INTO `extaz_shop_categories` VALUES ('0', 'Sans catégorie',  '2015-06-03', '2015-06-03');

-- ----------------------------
-- Table structure for extaz_buttons
-- ----------------------------
DROP TABLE IF EXISTS `extaz_buttons`;
CREATE TABLE IF NOT EXISTS `extaz_buttons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- ----------------------------
-- Table structure for extaz_comments
-- ----------------------------
DROP TABLE IF EXISTS `extaz_comments`;
CREATE TABLE IF NOT EXISTS `extaz_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip` text NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- ----------------------------
-- Table structure for extaz_codes
-- ----------------------------
DROP TABLE IF EXISTS `extaz_codes`;
CREATE TABLE IF NOT EXISTS `extaz_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip` text NOT NULL,
  `code` text NOT NULL,
  `value` int(11) DEFAULT NULL,
  `used` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- ----------------------------
-- Table structure for extaz_donation_ladder
-- ----------------------------
DROP TABLE IF EXISTS `extaz_donation_ladder`;
CREATE TABLE IF NOT EXISTS `extaz_donation_ladder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `tokens` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for extaz_informations
-- ----------------------------
DROP TABLE IF EXISTS `extaz_informations`;
CREATE TABLE IF NOT EXISTS `extaz_informations` (
  `id` int(11) NOT NULL DEFAULT '1',
  `debug` int(11) NOT NULL DEFAULT '0',
  `name_server` varchar(255) DEFAULT '',
  `ip_server` text,
  `port_server` int(11) DEFAULT NULL,
  `money_server` text,
  `jsonapi_ip` varchar(255) DEFAULT NULL,
  `jsonapi_port` int(11) DEFAULT NULL,
  `jsonapi_username` varchar(255) DEFAULT NULL,
  `jsonapi_password` varchar(255) DEFAULT NULL,
  `jsonapi_salt` varchar(255) DEFAULT NULL,
  `site_money` text,
  `starpass_idp` int(11) DEFAULT NULL,
  `starpass_idd` int(11) DEFAULT NULL,
  `starpass_tokens` int(11) DEFAULT NULL,
  `paypal_price` int(11) DEFAULT NULL,
  `paypal_tokens` int(11) DEFAULT NULL,
  `paypal_email` text,
  `contact_email` text,
  `logo_url` text,
  `use_store` int(11) DEFAULT NULL,
  `use_paypal` int(11) DEFAULT NULL,
  `use_economy` int(11) DEFAULT NULL,
  `use_server_money` int(11) DEFAULT NULL,
  `use_team` int(11) DEFAULT NULL,
  `use_contact` int(11) DEFAULT NULL,
  `use_rules` int(11) DEFAULT NULL,
  `use_donation_ladder` int(11) DEFAULT NULL,
  `use_slider` int(11) DEFAULT NULL,
  `use_captcha` int(11) DEFAULT NULL,
  `use_votes` int(11) DEFAULT NULL,
  `use_votes_ladder` int(11) DEFAULT NULL,
  `use_posts_views` int(11) DEFAULT NULL,
  `happy_hour` int(11) DEFAULT NULL,
  `happy_hour_bonus` int(11) DEFAULT NULL,
  `rules` longtext,
  `background` text,
  `chat_prefix` text,
  `chat_nb_messages` int(11) DEFAULT NULL,
  `analytics` text DEFAULT NULL,
  `maintenance` int(11) DEFAULT NULL,
  `send_tokens_loss_rate` int(11) DEFAULT NULL,
  `votes_url` text,
  `votes_description` varchar(255) NOT NULL,
  `votes_time` int(11) DEFAULT NULL,
  `votes_reward` int(11) DEFAULT NULL,
  `votes_command` text,
  `votes_ladder_limit` int(11) DEFAULT NULL,
  `customs_buttons_title` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of extaz_informations
-- ----------------------------
INSERT INTO `extaz_informations` VALUES ('1', '0', 'Nom du serveur', '127.0.0.1', '12345', 'PO', '127.0.0.1', '0', '', '', '', 'tokens', '0', '0', '25', '3', '30', '', '', 'http://extaz-cms.com/assets/logo.png', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', '0', '20', '', '3.jpg', 'Web', '20', '', '0', '0', 'http://www.rpg-paradize.com/', 'Votez pour notre serveur !', '180', '0', '', '15', '');

-- ----------------------------
-- Table structure for extaz_instant_payment_notifications
-- ----------------------------
DROP TABLE IF EXISTS `extaz_instant_payment_notifications`;
CREATE TABLE IF NOT EXISTS `extaz_instant_payment_notifications` (
  `id` char(36) NOT NULL,
  `notify_version` varchar(64) DEFAULT NULL COMMENT 'IPN Version Number',
  `verify_sign` varchar(127) DEFAULT NULL COMMENT 'Encrypted string used to verify the authenticityof the tansaction',
  `test_ipn` int(11) DEFAULT NULL,
  `address_city` varchar(40) DEFAULT NULL COMMENT 'City of customers address',
  `address_country` varchar(64) DEFAULT NULL COMMENT 'Country of customers address',
  `address_country_code` varchar(2) DEFAULT NULL COMMENT 'Two character ISO 3166 country code',
  `address_name` varchar(128) DEFAULT NULL COMMENT 'Name used with address (included when customer provides a Gift address)',
  `address_state` varchar(40) DEFAULT NULL COMMENT 'State of customer address',
  `address_status` varchar(20) DEFAULT NULL COMMENT 'confirmed/unconfirmed',
  `address_street` varchar(200) DEFAULT NULL COMMENT 'Customer''s street address',
  `address_zip` varchar(20) DEFAULT NULL COMMENT 'Zip code of customer''s address',
  `first_name` varchar(64) DEFAULT NULL COMMENT 'Customer''s first name',
  `last_name` varchar(64) DEFAULT NULL COMMENT 'Customer''s last name',
  `payer_business_name` varchar(127) DEFAULT NULL COMMENT 'Customer''s company name, if customer represents a business',
  `payer_email` varchar(127) DEFAULT NULL COMMENT 'Customer''s primary email address. Use this email to provide any credits',
  `payer_id` varchar(13) DEFAULT NULL COMMENT 'Unique customer ID.',
  `payer_status` varchar(20) DEFAULT NULL COMMENT 'verified/unverified',
  `contact_phone` varchar(20) DEFAULT NULL COMMENT 'Customer''s telephone number.',
  `residence_country` varchar(2) DEFAULT NULL COMMENT 'Two-Character ISO 3166 country code',
  `business` varchar(127) DEFAULT NULL COMMENT 'Email address or account ID of the payment recipient (that is, the merchant). Equivalent to the values of receiver_email (If payment is sent to primary account) and business set in the Website Payment HTML.',
  `item_name` varchar(127) DEFAULT NULL COMMENT 'Item name as passed by you, the merchant. Or, if not passed by you, as entered by your customer. If this is a shopping cart transaction, Paypal will append the number of the item (e.g., item_name_1,item_name_2, and so forth).',
  `item_number` varchar(127) DEFAULT NULL COMMENT 'Pass-through variable for you to track purchases. It will get passed back to you at the completion of the payment. If omitted, no variable will be passed back to you.',
  `quantity` varchar(127) DEFAULT NULL COMMENT 'Quantity as entered by your customer or as passed by you, the merchant. If this is a shopping cart transaction, PayPal appends the number of the item (e.g., quantity1,quantity2).',
  `receiver_email` varchar(127) DEFAULT NULL COMMENT 'Primary email address of the payment recipient (that is, the merchant). If the payment is sent to a non-primary email address on your PayPal account, the receiver_email is still your primary email.',
  `receiver_id` varchar(13) DEFAULT NULL COMMENT 'Unique account ID of the payment recipient (i.e., the merchant). This is the same as the recipients referral ID.',
  `custom` varchar(255) DEFAULT NULL COMMENT 'Custom value as passed by you, the merchant. These are pass-through variables that are never presented to your customer.',
  `invoice` varchar(127) DEFAULT NULL COMMENT 'Pass through variable you can use to identify your invoice number for this purchase. If omitted, no variable is passed back.',
  `memo` varchar(255) DEFAULT NULL COMMENT 'Memo as entered by your customer in PayPal Website Payments note field.',
  `option_name1` varchar(64) DEFAULT NULL COMMENT 'Option name 1 as requested by you',
  `option_name2` varchar(64) DEFAULT NULL COMMENT 'Option 2 name as requested by you',
  `option_selection1` varchar(200) DEFAULT NULL COMMENT 'Option 1 choice as entered by your customer',
  `option_selection2` varchar(200) DEFAULT NULL COMMENT 'Option 2 choice as entered by your customer',
  `tax` decimal(10,2) DEFAULT NULL COMMENT 'Amount of tax charged on payment',
  `auth_id` varchar(19) DEFAULT NULL COMMENT 'Authorization identification number',
  `auth_exp` varchar(28) DEFAULT NULL COMMENT 'Authorization expiration date and time, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `auth_amount` int(11) DEFAULT NULL COMMENT 'Authorization amount',
  `auth_status` varchar(20) DEFAULT NULL COMMENT 'Status of authorization',
  `num_cart_items` int(11) DEFAULT NULL COMMENT 'If this is a PayPal shopping cart transaction, number of items in the cart',
  `parent_txn_id` varchar(19) DEFAULT NULL COMMENT 'In the case of a refund, reversal, or cancelled reversal, this variable contains the txn_id of the original transaction, while txn_id contains a new ID for the new transaction.',
  `payment_date` varchar(28) DEFAULT NULL COMMENT 'Time/date stamp generated by PayPal, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `payment_status` varchar(20) DEFAULT NULL COMMENT 'Payment status of the payment',
  `payment_type` varchar(10) DEFAULT NULL COMMENT 'echeck/instant',
  `pending_reason` varchar(20) DEFAULT NULL COMMENT 'This variable is only set if payment_status=pending',
  `reason_code` varchar(20) DEFAULT NULL COMMENT 'This variable is only set if payment_status=reversed',
  `remaining_settle` int(11) DEFAULT NULL COMMENT 'Remaining amount that can be captured with Authorization and Capture',
  `shipping_method` varchar(64) DEFAULT NULL COMMENT 'The name of a shipping method from the shipping calculations section of the merchants account profile. The buyer selected the named shipping method for this transaction',
  `shipping` decimal(10,2) DEFAULT NULL COMMENT 'Shipping charges associated with this transaction. Format unsigned, no currency symbol, two decimal places',
  `transaction_entity` varchar(20) DEFAULT NULL COMMENT 'Authorization and capture transaction entity',
  `txn_id` varchar(19) DEFAULT '' COMMENT 'A unique transaction ID generated by PayPal',
  `txn_type` varchar(20) DEFAULT NULL COMMENT 'cart/express_checkout/send-money/virtual-terminal/web-accept',
  `exchange_rate` decimal(10,2) DEFAULT NULL COMMENT 'Exchange rate used if a currency conversion occured',
  `mc_currency` varchar(3) DEFAULT NULL COMMENT 'Three character country code. For payment IPN notifications, this is the currency of the payment, for non-payment subscription IPN notifications, this is the currency of the subscription.',
  `mc_fee` decimal(10,2) DEFAULT NULL COMMENT 'Transaction fee associated with the payment, mc_gross minus mc_fee equals the amount deposited into the receiver_email account. Equivalent to payment_fee for USD payments. If this amount is negative, it signifies a refund or reversal, and either ofthose p',
  `mc_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full amount of the customer''s payment',
  `mc_handling` decimal(10,2) DEFAULT NULL COMMENT 'Total handling charge associated with the transaction',
  `mc_shipping` decimal(10,2) DEFAULT NULL COMMENT 'Total shipping amount associated with the transaction',
  `payment_fee` decimal(10,2) DEFAULT NULL COMMENT 'USD transaction fee associated with the payment',
  `payment_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full USD amount of the customers payment transaction, before payment_fee is subtracted',
  `settle_amount` decimal(10,2) DEFAULT NULL COMMENT 'Amount that is deposited into the account''s primary balance after a currency conversion',
  `settle_currency` varchar(3) DEFAULT NULL COMMENT 'Currency of settle amount. Three digit currency code',
  `auction_buyer_id` varchar(64) DEFAULT NULL COMMENT 'The customer''s auction ID.',
  `auction_closing_date` varchar(28) DEFAULT NULL COMMENT 'The auction''s close date. In the format: HH:MM:SS DD Mmm YY, YYYY PSD',
  `auction_multi_item` int(11) DEFAULT NULL COMMENT 'The number of items purchased in multi-item auction payments',
  `for_auction` varchar(10) DEFAULT NULL COMMENT 'This is an auction payment - payments made using Pay for eBay Items or Smart Logos - as well as send money/money request payments with the type eBay items or Auction Goods(non-eBay)',
  `subscr_date` varchar(28) DEFAULT NULL COMMENT 'Start date or cancellation date depending on whether txn_type is subcr_signup or subscr_cancel',
  `subscr_effective` varchar(28) DEFAULT NULL COMMENT 'Date when a subscription modification becomes effective',
  `period1` varchar(10) DEFAULT NULL COMMENT '(Optional) Trial subscription interval in days, weeks, months, years (example a 4 day interval is 4 D',
  `period2` varchar(10) DEFAULT NULL COMMENT '(Optional) Trial period',
  `period3` varchar(10) DEFAULT NULL COMMENT 'Regular subscription interval in days, weeks, months, years',
  `amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 1 for USD',
  `amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 2 for USD',
  `amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription  period 1 for USD',
  `mc_amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 1 regardless of currency',
  `mc_amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 2 regardless of currency',
  `mc_amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription period regardless of currency',
  `recurring` varchar(1) DEFAULT NULL COMMENT 'Indicates whether rate recurs (1 is yes, blank is no)',
  `reattempt` varchar(1) DEFAULT NULL COMMENT 'Indicates whether reattempts should occur on payment failure (1 is yes, blank is no)',
  `retry_at` varchar(28) DEFAULT NULL COMMENT 'Date PayPal will retry a failed subscription payment',
  `recur_times` int(11) DEFAULT NULL COMMENT 'The number of payment installations that will occur at the regular rate',
  `username` varchar(64) DEFAULT NULL COMMENT '(Optional) Username generated by PayPal and given to subscriber to access the subscription',
  `password` varchar(24) DEFAULT NULL COMMENT '(Optional) Password generated by PayPal and given to subscriber to access the subscription (Encrypted)',
  `subscr_id` varchar(19) DEFAULT NULL COMMENT 'ID generated by PayPal for the subscriber',
  `case_id` varchar(28) DEFAULT NULL COMMENT 'Case identification number',
  `case_type` varchar(28) DEFAULT NULL COMMENT 'complaint/chargeback',
  `case_creation_date` varchar(28) DEFAULT NULL COMMENT 'Date/Time the case was registered',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for extaz_likes
-- ----------------------------
DROP TABLE IF EXISTS `extaz_likes`;
CREATE TABLE IF NOT EXISTS `extaz_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) DEFAULT '0',
  `ip` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for extaz_paypal_items
-- ----------------------------
DROP TABLE IF EXISTS `extaz_paypal_items`;
CREATE TABLE IF NOT EXISTS `extaz_paypal_items` (
  `id` varchar(36) NOT NULL,
  `instant_payment_notification_id` varchar(36) NOT NULL,
  `item_name` varchar(127) DEFAULT NULL,
  `item_number` varchar(127) DEFAULT NULL,
  `quantity` varchar(127) DEFAULT NULL,
  `mc_gross` float(10,2) DEFAULT NULL,
  `mc_shipping` float(10,2) DEFAULT NULL,
  `mc_handling` float(10,2) DEFAULT NULL,
  `tax` float(10,2) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for extaz_posts
-- ----------------------------
DROP TABLE IF EXISTS `extaz_posts`;
CREATE TABLE IF NOT EXISTS `extaz_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` longtext,
  `img` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(255) DEFAULT NULL,
  `progress` int(11) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL,
  `draft` int(11) DEFAULT NULL,
  `corrected` int(11) DEFAULT NULL,
  `posted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of extaz_posts
-- ----------------------------
INSERT INTO `extaz_posts` VALUES ('1', 'Ipsum', 'Lorem', 'slug-slug-slug', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n', 'http://i.imgur.com/Kec0o8z.jpg', 'MrSaooty', '0', '0', '0', '1', '0', '0', '2014-12-05 20:19:42', '2014-12-05 20:19:42', '2014-12-05 20:19:42');
INSERT INTO `extaz_posts` VALUES ('2', 'Ipsum', 'Lorem', 'slug-slug-slug', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n', 'http://i.imgur.com/Kec0o8z.jpg', 'MrSaooty', '0', '0', '0', '1', '0', '0', '2014-12-05 20:19:42', '2014-12-05 20:19:42', '2014-12-05 20:19:42');
INSERT INTO `extaz_posts` VALUES ('3', 'Ipsum', 'Lorem', 'slug-slug-slug', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n', 'http://i.imgur.com/Kec0o8z.jpg', 'MrSaooty', '0', '0', '0', '1', '0', '0', '2014-12-05 20:19:42', '2014-12-05 20:19:42', '2014-12-05 20:19:42');
INSERT INTO `extaz_posts` VALUES ('4', 'Ipsum', 'Lorem', 'slug-slug-slug', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n', 'http://i.imgur.com/Kec0o8z.jpg', 'MrSaooty', '0', '0', '0', '1', '0', '0', '2014-12-05 20:19:42', '2014-12-05 20:19:42', '2014-12-05 20:19:42');
INSERT INTO `extaz_posts` VALUES ('5', 'Ipsum', 'Lorem', 'slug-slug-slug', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n', 'http://i.imgur.com/Kec0o8z.jpg', 'MrSaooty', '0', '0', '0', '1', '0', '0', '2014-12-05 20:19:42', '2014-12-05 20:19:42', '2014-12-05 20:19:42');
INSERT INTO `extaz_posts` VALUES ('6', 'Ipsum', 'Lorem', 'slug-slug-slug', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n', 'http://i.imgur.com/Kec0o8z.jpg', 'MrSaooty', '0', '0', '0', '1', '0', '0', '2014-12-05 20:19:42', '2014-12-05 20:19:42', '2014-12-05 20:19:42');

-- ----------------------------
-- Table structure for extaz_posts_views
-- ----------------------------
DROP TABLE IF EXISTS `extaz_posts_views`;
CREATE TABLE IF NOT EXISTS `extaz_posts_views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- ----------------------------
-- Table structure for extaz_shop
-- ----------------------------
DROP TABLE IF EXISTS `extaz_shop`;
CREATE TABLE IF NOT EXISTS `extaz_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `description` text,
  `cat` text,
  `img` text,
  `visible` int(11) DEFAULT NULL,
  `promo` int(11) DEFAULT NULL,
  `required` text,
  `required_name` text,
  `price_money_site` int(11) DEFAULT NULL,
  `price_money_server` int(11) DEFAULT NULL,
  `command` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for extaz_shop_history
-- ----------------------------
DROP TABLE IF EXISTS `extaz_shop_history`;
CREATE TABLE IF NOT EXISTS `extaz_shop_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `item` text,
  `item_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `money` text,
  `quantity` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for extaz_starpass_history
-- ----------------------------
DROP TABLE IF EXISTS `extaz_starpass_history`;
CREATE TABLE IF NOT EXISTS `extaz_starpass_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `tokens` int(11) DEFAULT NULL,
  `code` text,
  `note` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for extaz_support
-- ----------------------------
DROP TABLE IF EXISTS `extaz_support`;
CREATE TABLE IF NOT EXISTS `extaz_support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `message` longtext,
  `resolved` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for extaz_support_comments
-- ----------------------------
DROP TABLE IF EXISTS `extaz_support_comments`;
CREATE TABLE IF NOT EXISTS `extaz_support_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` longtext,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for extaz_team
-- ----------------------------
DROP TABLE IF EXISTS `extaz_team`;
CREATE TABLE IF NOT EXISTS `extaz_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT '',
  `rank` text,
  `color` text,
  `order` int(11),
  `facebook_url` text,
  `twitter_url` text,
  `youtube_url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for extaz_users
-- ----------------------------
DROP TABLE IF EXISTS `extaz_users`;
CREATE TABLE IF NOT EXISTS `extaz_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `tokens` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `allow_email` int(11) DEFAULT NULL,
  `votes` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for extaz_widgets
-- ----------------------------
DROP TABLE IF EXISTS `extaz_widgets`;
CREATE TABLE IF NOT EXISTS `extaz_widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` longtext NOT NULL,
  `ip` text NOT NULL,
  `order` int(11) NOT NULL,
  `visible` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;