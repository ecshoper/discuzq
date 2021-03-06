<?php

/**
 * Copyright (C) 2020 Tencent Cloud.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

use Discuz\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupPaidUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('group_paid_users', function (Blueprint $table) {
            $table->id()->comment('自增id');
            $table->unsignedBigInteger('user_id')->comment('所属用户');
            $table->unsignedInteger('group_id')->comment('用户组 id');
            $table->unsignedBigInteger('order_id')->default(0)->comment('订单 id');
            $table->unsignedBigInteger('operator_id')->nullable()->comment('操作人');
            $table->unsignedTinyInteger('delete_type')->default(0)->comment('删除类型：1到期删除，2管理员修改，3用户复购');
            $table->dateTime('expiration_time')->comment('用户组到期时间');
            $table->dateTime('created_at')->comment('创建时间');
            $table->dateTime('updated_at')->comment('更新时间');
            $table->dateTime('deleted_at')->nullable()->comment('删除时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema()->dropIfExists('group_paid_users');
    }
}
