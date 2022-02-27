<?php
  
   /**
    * 增量元素之间的最大差值
    * @desc 前缀最小值，时间复杂度：O(n)，我们只需要对数组 $nums 进行一次遍历，空间复杂度：O(1)
    * @return int
    * @author gengjianhao
    * @time 2022/02/26 18:00
    */
   function maximumDifference($nums) {
        $length = count($nums);
        $ans = -1;
        $minNum = $nums[0];
        for ($i = 1; $i < $length; ++$i) {
            if ($nums[$i] > $minNum) {
                $tmpAns = $nums[$i] - $minNum;
                $ans = $ans > $tmpAns ? $ans : $tmpAns;
            } else {
                $minNum = $nums[$i];
            }
        }
        return $ans;
   }

    /**
     * 两数之和(暴力美学版)
     * @param Interget[] $nums
     * @param Interget $target
     * @return array
     * @author gengjianhao
     * @time 2022/02/27 14:30
     */
    function twoSumForBruteForce($nums, $target) {
        $res = array();
        $length = count($nums);
        if ($length < 2) return $res;

        for($i = 0; $i < $length; $i++) {
            for($j = 1; $j < $length; $j++) {
                if ($nums[$j] == $target - $nums[$i]) {
                    $res = array($i, $j);
                    break 2;
                }
            }
        }
        return $res;
    }

?>
